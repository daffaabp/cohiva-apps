<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate();

        return view('role.index', compact('roles'))->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $role = new Role();
        return view('role.create', compact('role', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $roleData = $request->validated();

        // Create new role
        $role = Role::create($roleData);

        // Attach permissions to the role
        if ($request->has('permission')) {
            $permissions = Permission::whereIn('id', $request->input('permission'))->get();
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = $role->permissions()->pluck('id')->all();

        return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        // Mendapatkan permission yang telah dipilih dari formulir edit
        $permissions = $request->input('permission', []);

        // Mendapatkan permission yang sudah dimiliki oleh role yang sedang diubah
        $existingPermissions = $role->permissions->pluck('id')->toArray();

        // Menemukan permission baru yang harus ditambahkan ke role
        $permissionsToAdd = array_diff($permissions, $existingPermissions);

        // Menemukan permission yang harus dihapus dari role
        $permissionsToRemove = array_diff($existingPermissions, $permissions);

        // Menambahkan permission baru ke role
        foreach ($permissionsToAdd as $permissionId) {
            $permission = Permission::find($permissionId);
            $role->givePermissionTo($permission);
        }

        // Menghapus permission yang tidak dipilih dari role
        foreach ($permissionsToRemove as $permissionId) {
            $permission = Permission::find($permissionId);
            $role->revokePermissionTo($permission);
        }

        // Update permission pada model_has_permissions untuk pengguna terkait
        foreach ($role->users as $user) {
            $userPermissions = $user->permissions->pluck('id')->toArray();

            // Menemukan permission baru yang harus ditambahkan ke pengguna
            $userPermissionsToAdd = array_diff($permissions, $userPermissions);

            // Menemukan permission yang harus dihapus dari pengguna
            $userPermissionsToRemove = array_diff($userPermissions, $permissions);

            // Menambahkan permission baru ke pengguna
            foreach ($userPermissionsToAdd as $permissionId) {
                $permission = Permission::find($permissionId);
                $user->givePermissionTo($permission);
            }

            // Menghapus permission yang tidak dipilih dari pengguna
            foreach ($userPermissionsToRemove as $permissionId) {
                $permission = Permission::find($permissionId);
                $user->revokePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        // Mengambil informasi pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah rolenya adalah superadmin
        if ($role->name === 'Superadmin' && $user->hasRole('Superadmin')) {
            return redirect()->route('role.index')->with('error', 'Anda tidak bisa menghapus peran Superadmin sendiri.');
        }

        // Periksa apakah masih ada pengguna yang memiliki role ini
        $usersWithRole = $role->users;
        if ($usersWithRole->isNotEmpty()) {
            return redirect()->route('role.index')->with('error', 'Tidak dapat menghapus role yang masih digunakan oleh pengguna');
        }

        // Hapus peran jika bukan peran Superadmin atau pengguna yang login bukanlah Superadmin
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }

    public function getPermissions()
    {
        $routes = Route::getRoutes();

        $routeNames = [];
        foreach ($routes as $route) {
            $routeName = $route->getName();
            if ($routeName !== null && !Str::startsWith($routeName, ['password.', 'verification.', 'debugbar.', 'sanctum.', 'ignition.', 'profile.', 'login', 'logout', 'register', 'livewire.', 'cariAset'])) {
                $routeNames[] = $routeName;
            }
        }

        $existingRoutes = DB::table('permissions')->whereIn('name', $routeNames)->pluck('name')->toArray();

        $dataToInsert = [];

        foreach ($routes as $route) {
            $routeName = $route->getName();
            if ($routeName !== null && !Str::startsWith($routeName, ['password.', 'verification.', 'debugbar.', 'sanctum.', 'ignition.', 'profile.', 'login', 'logout', 'register', 'livewire.', 'cariAset'])) {
                if (!in_array($routeName, $existingRoutes)) {
                    if ($route->getName() != null) {
                        $dataToInsert[] = [
                            'name' => $route->getName(),
                            'guard_name' => 'web',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
        }

        if (!empty($dataToInsert)) {
            DB::table('permissions')->insert($dataToInsert);
            return redirect()->back()->with('success', 'Routes Berhasil Di Update!');
        } else {
            return redirect()->back()->with('success', 'Semua Routes Sudah Berhasil Ditambahkan!');
        }
    }

    public function refreshAndDeletePermissions()
    {
        // Ambil semua routes dari proyek
        $routes = Route::getRoutes();
        $routeNames = collect($routes)
            ->map(function ($route) {
                return $route->getName();
            })
            ->filter(function ($name) {
                // Filter out routes that should not be considered for deletion
                return $name !== null && !Str::startsWith($name, ['password.', 'verification.', 'debugbar.', 'sanctum.', 'ignition.', 'profile.', 'login', 'logout', 'register', 'livewire.', 'cariAset']);
            })
            ->toArray();

        // Ambil semua nama permissions dari tabel permissions
        $permissions = DB::table('permissions')->pluck('name')->toArray();

        // Temukan nama permissions yang perlu dihapus
        $permissionsToDelete = array_diff($permissions, $routeNames);

        // Hapus permissions yang tidak cocok dengan routes
        if (!empty($permissionsToDelete)) {
            DB::table('permissions')->whereIn('name', $permissionsToDelete)->delete();
            return redirect()->back()->with('success', 'Permissions yang tidak terpakai berhasil dihapus.');
        } else {
            return redirect()->back()->with('success', 'Tidak ada permissions yang dihapus.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $users = User::with('roles')->paginate();
    //     return view('user.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    // }

    public function index(Request $request)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Superadmin', 'Admin']);
        })->paginate();

        return view('user.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $roles = Role::all();
        return view('user.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($request->password);

        try {
            $user = User::create($validated);
            $role = $request->role;

            if ($role) {
                if ($selectedRole = Role::where('name', $role)->first()) {
                    $user->assignRole($selectedRole);
                    $permissionsFromRole = $selectedRole->permissions;
                    $user->givePermissionTo($permissionsFromRole);
                    return redirect()->route('users.index')->with('success', 'Berhasil membuat user.');
                } else {
                    return redirect()->route('users.index')->with('error', 'Role yang dipilih tidak valid.');
                }
            } else {
                return redirect()->route('users.index')->with('error', 'Peran tidak boleh kosong.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat user.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'username' => ['required', Rule::unique('users')->ignore($id), 'regex:/^\S*$/'],
                'email' => 'required|email|unique:users,email,' . $id,
                'isPasien' => 'required',
                'password' => 'nullable|min:8|confirmed|regex:/^\S*$/',
                'password_confirmation' => 'nullable|min:8|regex:/^\S*$/',
                'role' => 'required|string',
            ],
            [
                'name.required' => 'Nama harus diisi!',
                'username.required' => 'Username harus diisi!',
                'username.regex' => 'Username TIDAK BOLEH mengandung spasi!',
                'email.required' => 'Email harus diisi!',
                'email.email' => 'Email harus berformat valid!',
                'email.unique' => 'Email sudah digunakan!',
                'isPasien.required' => 'is Pasien harus diisi!',
                'password.min' => 'Password minimal 8 karakter!',
                'password.confirmed' => 'Password harus sama dengan konfirmasi password!',
                'password.regex' => 'Password TIDAK BOLEH mengandung spasi!',
                'password_confirmation.min' => 'Konfirmasi Password minimal 8 karakter!',
                'password_confirmation.regex' => 'Konfirmasi Password TIDAK BOLEH mengandung spasi!',
                'role.required' => 'Role harus dipilih!',
            ],
        );

        $user = User::findOrFail($id);
        $input = $request->only('name', 'email', 'username', 'isPasien');

        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $user->update($input);

        $selectedRole = Role::where('name', $request->role)->firstOrFail();
        $user->roles()->detach();
        $user->assignRole($selectedRole);
        $permissionsFromRole = $selectedRole->permissions;
        $user->syncPermissions($permissionsFromRole);
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $loggedInUserId = Auth::id();

            // Cek apakah pengguna yang akan dihapus sama dengan pengguna yang sedang login
            if ($loggedInUserId == $id) {
                return redirect()->route('users.index')->with('error', 'Anda tidak dapat menghapus diri sendiri.');
            }

            User::find($id)->delete();
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return redirect()->route('users.index')->with('error', 'User tidak bisa dihapus!');
            }
        }

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Step 1: Create Permissions
        $this->createPermissions();

        // Step 2: Create Superadmin And Admin Role
        $this->createSuperadminAndAdminRole();
    }

    private function createPermissions()
    {
        $permissions = [
            'home_new',
            'roles.get-permissions',
            'roles.refresh-delete-permissions',
            'roles.index',
            'roles.create',
            'roles.store',
            'roles.show',
            'roles.edit',
            'roles.update',
            'roles.destroy',
            'konselors.createuser',
            'konselors.storeusers',
            'konselors.index',
            'konselors.create',
            'konselors.store',
            'konselors.update',
            'konselors.edit',
            'konselors.destroy',
            'konselors.show',
            'konselors.showResetPasswordForm',
            'konselors.updatePassword',
            'pasiens.index',
            'pasiens.create',
            'pasiens.store',
            'pasiens.update',
            'pasiens.edit',
            'pasiens.destroy',
            'pasiens.show',
            'users.index',
            'users.create',
            'users.store',
            'users.update',
            'users.edit',
            'users.destroy',
            'users.show',
            'jadwal-konselors.index',
            'jadwal-konselors.create',
            'jadwal-konselors.store',
            'jadwal-konselors.show',
            'jadwal-konselors.edit',
            'jadwal-konselors.update',
            'jadwal-konselors.destroy',
            'getjadwal',
            'janji-konselings.index',
            'janji-konselings.store',
            'janji-konselings.show',
            'janji-konselings.edit',
            'janji-konselings.update',
            'janji-konselings.destroy',
            'janji-konseling.create',
            'janjikonseling.pilihkonselor',
            'konselings.index',
            'konselings.create',
            'konselings.store',
            'konselings.show',
            'konselings.edit',
            'konselings.update',
            'konselings.destroy',
            'info_hiv',
            'daftar_konselor',
            'jadwalkan_konseling',
            'janji-konselings.janjikonselor',
            'janji-konselings.detailbykonselor',
            'konselings.konselingbykonselor',
            'konselings.rekapkonseling',
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }

    private function createSuperadminAndAdminRole()
    {
        if (!Role::where('name', 'Superadmin')->exists()) {
            $superadminRole = Role::create(['name' => 'Superadmin']);

            $superadminPermissions = ['home_new', 'roles.get-permissions', 'roles.refresh-delete-permissions', 'roles.index', 'roles.create', 'roles.store', 'roles.show', 'roles.edit', 'roles.update', 'roles.destroy', 'users.index', 'users.create', 'users.store', 'users.update', 'users.edit', 'users.destroy', 'users.show'];

            foreach ($superadminPermissions as $permission) {
                $superadminRole->givePermissionTo($permission);
            }

            if (!User::where('email', 'superadmin@gmail.com')->exists()) {
                $superadminUser = User::create([
                    'name' => 'Superadmin',
                    'email' => 'superadmin@gmail.com',
                    'password' => Hash::make('cohiva150824'),
                    'remember_token' => null,
                    'username' => 'superadmin',
                    'isPasien' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $superadminUser->assignRole($superadminRole);
            }
        }

        if (!Role::where('name', 'Admin')->exists()) {
            $adminRole = Role::create(['name' => 'Admin']);

            $adminPermissions = ['home_new', 'konselors.createuser', 'konselors.storeusers', 'konselors.index', 'konselors.create', 'konselors.store', 'konselors.update', 'konselors.edit', 'konselors.destroy', 'konselors.show', 'konselors.showResetPasswordForm', 'konselors.updatePassword', 'pasiens.index', 'pasiens.create', 'pasiens.store', 'pasiens.update', 'pasiens.edit', 'pasiens.show', 'jadwal-konselors.index', 'jadwal-konselors.create', 'jadwal-konselors.store', 'jadwal-konselors.show', 'jadwal-konselors.edit', 'jadwal-konselors.update', 'jadwal-konselors.destroy', 'getjadwal', 'janji-konselings.index', 'janji-konselings.store', 'janji-konselings.show', 'janji-konselings.edit', 'janji-konselings.update', 'janji-konselings.destroy', 'janji-konseling.create', 'janjikonseling.pilihkonselor', 'konselings.index', 'konselings.create', 'konselings.store', 'konselings.show', 'konselings.edit', 'konselings.update', 'konselings.rekapkonseling'];

            foreach ($adminPermissions as $permission) {
                $adminRole->givePermissionTo($permission);
            }

            if (!User::where('email', 'admincohiva@gmail.com')->exists()) {
                $adminUser = User::create([
                    'name' => 'Admin User',
                    'email' => 'admincohiva@gmail.com',
                    'password' => Hash::make('cohiva150824'),
                    'remember_token' => null,
                    'username' => 'admincohiva',
                    'isPasien' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $adminUser->assignRole($adminRole);
            }
        }
    }
}
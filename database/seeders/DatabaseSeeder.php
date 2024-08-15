<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Konselor;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createPermissions();

        $this->createSuperadminAndAdminRole();

        $this->createKonselorAndPasienRole();

        $this->createKonselorUsers();
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

            foreach ($superadminPermissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
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
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $superadminUser->assignRole($superadminRole);

                $superadminUser->givePermissionTo($superadminPermissions);
            }
        }

        if (!Role::where('name', 'Admin')->exists()) {
            $adminRole = Role::create(['name' => 'Admin']);

            $adminPermissions = ['home_new', 'konselors.createuser', 'konselors.storeusers', 'konselors.index', 'konselors.create', 'konselors.store', 'konselors.update', 'konselors.edit', 'konselors.destroy', 'konselors.show', 'konselors.showResetPasswordForm', 'konselors.updatePassword', 'pasiens.index', 'pasiens.create', 'pasiens.store', 'pasiens.update', 'pasiens.edit', 'pasiens.show', 'jadwal-konselors.index', 'jadwal-konselors.create', 'jadwal-konselors.store', 'jadwal-konselors.show', 'jadwal-konselors.edit', 'jadwal-konselors.update', 'jadwal-konselors.destroy', 'getjadwal', 'janji-konselings.index', 'janji-konselings.store', 'janji-konselings.show', 'janji-konselings.edit', 'janji-konselings.update', 'janji-konselings.destroy', 'janji-konseling.create', 'janjikonseling.pilihkonselor', 'konselings.index', 'konselings.create', 'konselings.store', 'konselings.show', 'konselings.edit', 'konselings.update', 'konselings.rekapkonseling'];

            foreach ($adminPermissions as $permissionName) {
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
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
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $adminUser->assignRole($adminRole);

                $adminUser->givePermissionTo($adminPermissions);
            }
        }
    }

    private function createKonselorAndPasienRole()
    {
        if (!Role::where('name', 'Konselor')->exists()) {
            $konselorRole = Role::create(['name' => 'Konselor']);

            $konselorPermissions = ['home_new', 'getjadwal', 'janji-konselings.show', 'janji-konselings.janjikonselor', 'janji-konselings.detailbykonselor', 'konselings.konselingbykonselor'];

            foreach ($konselorPermissions as $permission) {
                $permissionModel = Permission::firstOrCreate(['name' => $permission]);
                $konselorRole->givePermissionTo($permissionModel);
            }
        }

        if (!Role::where('name', 'Pasien')->exists()) {
            $pasienRole = Role::create(['name' => 'Pasien']);

            $pasienPermissions = ['home_new', 'pasiens.create', 'pasiens.store', 'info_hiv', 'daftar_konselor', 'jadwalkan_konseling'];

            foreach ($pasienPermissions as $permission) {
                $permissionModel = Permission::firstOrCreate(['name' => $permission]);
                $pasienRole->givePermissionTo($permissionModel);
            }
        }
    }

    private function createKonselorUsers()
    {
        $this->createKonselorUser('Rubino Sriadji, S. Psi., M.Si', 'rubino', 'rubino@gmail.com', 'cohiva150824', 'Komisi Penanggulangan Aids (KPA) Kabupaten Cilacap,', '081225435123', 1);
        $this->createKonselorUser('Nunung Sawitri Yulianti,S.Psi,M.Psi', 'nunungsawitri', 'nunung@gmail.com', 'cohiva150824', 'Rsud Simo kab Boyolali Jawa tengah', '087835455533', 1);
        $this->createKonselorUser('Eko Nugro Hadi Priyono.,S.Kep.Ns', 'ekonugrohadi', 'ekonugroho@gmail.com', 'cohiva150824', 'Puskesmas Margasari Kabupaten Tegal', '085742627660', 1);
        $this->createKonselorUser('Dwi Fajar Asmarawati', 'dwifajar', 'dwifajar@gmail.com', 'cohiva150824', 'Puskesmas Mijen', '08562772428', 1);
        $this->createKonselorUser('drg.Rochman Mujayanto, Sp.PM', 'rochman', 'rochman@gmail.com', 'cohiva150824', 'RS Hermina Pandanaran Semarang', '087864819000', 1);
        $this->createKonselorUser('Drg. Ade Puspa Sari, Sp.PM', 'adepuspa', 'adepuspa@gmail.com', 'cohiva150824', 'RSUP Dr. Mohammad Hoesin', '081330519024', 1);
        $this->createKonselorUser('Drg. Vita Darmawati,MKes.,SpPM', 'vitadarmawati', 'vitadarmawati@gmail.com', 'cohiva150824', 'RSUD dr. Abdoer Rahem', '081336901006', 1);
        $this->createKonselorUser('Petty Juniarty, S. Psi, M. Psi, Psikolog', 'pettyjuniarty', 'pettyjuniarty@gmail.com', 'cohiva150824', 'Lapas kelas IIB Brebes', '08562607968', 1);
        $this->createKonselorUser('Endang Purwanti', 'endangpurwanti', 'endangpurwanti@gmail.com', 'cohiva150824', 'PUSKESMAS SECANG 1', '0895363867704', 1);
        $this->createKonselorUser('Sri Murwani Nuraini, A.Md.Keb', 'srimurwani', 'srimurwani@gmail.com', 'cohiva150824', 'UPTD Puskesmas Cilacap Selatan 2', '085113351997', 1);
        $this->createKonselorUser('Siti Nur Minhayati, S. Kep, Ns', 'sitinurminhayati', 'sitinurminhayati@gmail.com', 'cohiva150824', 'Puskesmas Krobokan', '085234561232', 1);
        $this->createKonselorUser('Anik Sulistyowati, STr. Keb', 'aniksulistyowati', 'aniksulistyowati@gmail.com', 'cohiva150824', 'RSU Muhammadiyah', '081233517444', 1);
        $this->createKonselorUser('Eko Setia Budi, S.Kep', 'ekosetiabudi', 'ekosetiabudi@gmail.com', 'cohiva150824', 'UPTD Puskesmas Kroya II', '081325329964', 1);
        $this->createKonselorUser('Dwi Maryanti, S. Si. T., Bdn., M. Kes', 'dwimaryanti', 'dwimaryanti@gmail.com', 'cohiva150824', 'Universitas Al Irsyad Cilacap', '08157967212', 1);
        $this->createKonselorUser('Sohimah, S. ST., M. Keb', 'sohimah', 'sohimah@gmail.com', 'cohiva150824', 'Universitas Al Irsyad Cilacap', '085842538844', 1);
        $this->createKonselorUser('Trimeilia Suprihatiningsih, S. Kep., M. Kes', 'trimeilia', 'trimeilia@gmail.com', 'cohiva150824', 'Universitas Al Irsyad Cilacap', '081542859522', 1);
    }

    private function createKonselorUser($name, $username, $email, $password, $unitKerja, $noTelponKonselor, $isAktif)
    {
        $konselorRole = Role::where('name', 'Konselor')->first();

        if ($konselorRole) {
            if (!User::where('email', $email)->exists()) {
                $konselorUser = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'remember_token' => null,
                    'username' => $username,
                    'isPasien' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $konselorUser->assignRole($konselorRole);

                $konselorPermissions = $konselorRole->permissions;

                $konselorUser->givePermissionTo($konselorPermissions);

                $id_konselor = $this->generateUniqueKonselorId();

                Konselor::create([
                    'id_konselor' => $id_konselor,
                    'id_user' => $konselorUser->id,
                    'nama_konselor' => $konselorUser->name,
                    'notelpon_konselor' => $noTelponKonselor,
                    'unit_kerja' => $unitKerja,
                    'foto_konselor' => null,
                    'is_aktif' => $isAktif,
                ]);
            } else {
                echo "User with email '{$email}' already exists.\n";
            }
        } else {
            echo "Role 'Konselor' does not exist.\n";
        }
    }

    private function generateUniqueKonselorId()
    {
        do {
            $id_konselor = random_int(1, 999999);
        } while (Konselor::where('id_konselor', $id_konselor)->exists());

        return $id_konselor;
    }
}

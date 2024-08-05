<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\DeleteUnverifiedUser;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function registered(Request $request, $user)
    {
        // $user->sendEmailVerificationNotification();
        // Tambahkan role "Pasien" setelah registrasi dan verifikasi email
        $role = Role::where('name', 'Pasien')->first();
        $user->assignRole($role);

        // Tambahkan permissions yang terkait dengan role "Pasien"
        $user->syncPermissions($role->permissions);
        // Logout user after registration
        $this->guard()->logout();

        return redirect($this->redirectPath())->with('success', 'Registrasi berhasil. Silahkan login kembali.');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'username' => ['required', 'string', 'max:20', 'unique:users', 'regex:/^\S*$/', 'min:5'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'username.unique' => 'Username sudah ada, harap isi dengan yang lain.',
                'regex' => 'Username tidak boleh mengandung karakter spasi',
                'min' => 'Username minimal berisi 5 karakter',
                'max' => 'Username tidak boleh melebihi 20 karakter',
                'email.unique' => 'Email sudah pernah digunakan atau tidak valid.',
                'confirmed' => 'Konfirmasi Password harus sama.',
            ],
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'isPasien' => 1,
        ]);
    }
}
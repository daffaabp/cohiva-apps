<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Custom logic to check if the username exists
        if (!Auth::attempt($request->only('username', 'password'))) {
            $userExists = Auth::getProvider()->retrieveByCredentials($request->only('username'));

            if ($userExists) {
                $errors = [$this->username() => trans('username/password salah. Silahkan periksa kembali')];
            } else {
                $errors = ['username' => 'Username belum terdaftar. Silahkan registrasi terlebih dahulu.'];
            }
        }

        throw ValidationException::withMessages($errors);
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
             return redirect()->route('verification.verify');  // Jika email belum diverifikasi, arahkan ke halaman tertentu
        }

        // Jika pengguna telah diverifikasi, tetapi belum memiliki role "Pasien", tambahkan role "Pasien"
        if (!$user->hasRole('Pasien')) {
            $role = Role::where('name', 'Pasien')->first();
            $user->assignRole($role);

            // Tambahkan permissions yang terkait dengan role "Pasien"
            $user->syncPermissions($role->permissions);
        }
    }

    protected function username()
    {
        return 'username';
    }
}

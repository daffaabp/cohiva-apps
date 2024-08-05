<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
        if (!$user->hasRole(['Superadmin', 'Admin', 'Konselor'])) {

            // if (!$user->hasVerifiedEmail()) {
            //     return redirect()->route('verification.verify');  // Jika email belum diverifikasi, arahkan ke halaman tertentu
            // }

            //cek role usernya dulu
            if ($user->hasRole('Pasien')) {
                //cek user dengan role pasien untuk input data pasien
                $pasien = Pasien::where('id_user', $user->id)->first();
                if (empty($pasien)) {
                    return redirect()->route('pasiens.create');
                }
            }
        }else{
            return redirect()->route('home_new');
        }
    }

    protected function username()
    {
        return 'username';
    }
}
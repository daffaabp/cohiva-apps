<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

    protected function username()
    {
        return 'username';
    }
}
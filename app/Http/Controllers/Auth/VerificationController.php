<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Auth\RegisterController;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Handle the user verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(403);
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect($this->redirectPath())->with('verified', true); // Menambahkan pesan bahwa email berhasil diverifikasi
    }

    // public function verify(Request $request, User $user)
    // {
    //     if (!hash_equals((string) $request->route('id'), (string) $user->getKey())) {
    //         abort(403);
    //     }

    //     if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
    //         abort(403);
    //     }

    //     if ($user->hasVerifiedEmail()) {
    //         return redirect($this->redirectPath());
    //     }

    //     if ($user->markEmailAsVerified()) {
    //         event(new Verified($user));
    //     }

    //     // Tambahkan pengguna setelah verifikasi email berhasil
    //     app(RegisterController::class)->createAndStoreUser($user->toArray());

    //     // Redirect user ke halaman yang sesuai
    //     return redirect($this->redirectPath())->with('verified', true);
    // }
}

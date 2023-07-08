<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Helpers\ActivityLog;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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

    public function verify($id) {
        $user = User::findOrFail($id);

        if (!empty($user->email_verified_at)) {
            Alert::warning('Attention', 'Your account has been activated.');
            return redirect()->route('home.index');
        }

        $user->email_verified_at = Carbon::now();
        $user->save();

        Auth::logout();
        Auth::login($user);

        SendReminder::dispatch($user);

        ActivityLog::logging('Verified');

        Alert::success('Sukses', 'Aktivasi akun berhasil.');
        return redirect()->route('home.index');
    }
}

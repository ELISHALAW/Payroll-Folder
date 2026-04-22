<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form to enter the email.
     */
    public function index()
    {
        return view('auth.sendEmail');
    }
    /**
     * Send the reset link to the user's email.
     */
   public function sendResetLinkEmail(Request $request)
{
    // 1. Validate email exists
    $request->validate(['email' => 'required|email|exists:users,email']);

    try {
        // 2. Use the Password Facade
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            // Success: Return with a status message for the SweetAlert
            return back()->with('status', 'Success! A reset link has been sent to your Gmail.');
        }

        // Failure from Password Facade (e.g., throttled)
        return back()->withErrors(['email' => __($status)]);

    } catch (\Exception $e) {
        // SMTP Error (Gmail connection issue)
        return back()->withErrors(['email' => 'SMTP Error: ' . $e->getMessage()]);
    }
}

    /**
     * Show the form to enter the new password.
     */
    public function showResetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Handle the password update.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}

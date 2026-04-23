<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
        $request->validate(['email' => 'required|email|exists:users,email']);

        try {
            $status = Password::sendResetLink($request->only('email'));

            return $status === Password::RESET_LINK_SENT
                ? back()->with('status', 'Success! A reset link has been sent to your Gmail.')
                : back()->withErrors(['email' => __($status)]);
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'SMTP Error: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form to enter the new password.
     */
    public function showResetPassword($token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => request()->query('email'),
        ]);
    }

    /**
     * Handle the password update securely using Laravel's built-in validation.
     */
public function resetPassword(Request $request)
{
    $request->validate([
        'token'    => 'required',
        'email'    => 'required|email|exists:users,email',
        'password' => 'required|string|min:8|confirmed',
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

    // --- DEBUG LINE ---
    if ($status !== Password::PASSWORD_RESET) {
        dd([
            'Status' => $status, 
            'Translation' => __($status),
            'Email_Sent' => $request->email,
            'Token_Sent' => $request->token
        ]);
    }
    // ------------------

    return redirect()->route('login')->with('success', 'Your password has been reset!');
}
}

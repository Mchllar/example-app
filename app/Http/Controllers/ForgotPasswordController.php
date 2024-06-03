<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendResetLinkEmail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot_password');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // If user doesn't exist, redirect back with error
        if (!$user) {
            return back()->withErrors(['email' => 'User with this email does not exist.']);
        }

        // Generate the reset token and save it
        $token = $this->generateToken($user);

        // Generate the reset link
        $resetLink = route('password.reset', ['token' => $token, 'email' => $user->email]);

        // Send the reset link email using the custom mailable
        Mail::to($user->email)->send(new SendResetLinkEmail($resetLink));

        // Redirect back with success message
        return redirect('/login')->with('message', 'Check your email to reset your password');
    }

    // Generate token and save it for the user
    private function generateToken($user)
    {
        $token = \Illuminate\Support\Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['email' => $user->email, 'token' => bcrypt($token), 'created_at' => now()]
        );

        return $token;
    }
}

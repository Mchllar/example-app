<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot_password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        /*return $status === Password::RESET_LINK_SENT
            ? back()->with('message', 'Check your email to reset password')
            : back()->withErrors(['email' => __($status)]);*/
        return redirect('/login')->with('message', 'Check your email to reset your password');
    }
}

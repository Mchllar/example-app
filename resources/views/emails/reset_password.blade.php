<!-- resources/views/emails/reset_password.blade.php -->

<h1 style="color: black; font-weight: bold;">Reset Your Password</h1>

<p style="color: black;">You are receiving this email because we received a password reset request for your account.</p>

<p style="color: black;">If you did not request a password reset, no further action is required.</p>

<p style="color: black;">Thanks,<br> SGS</p>

<p style="text-align: left;">
    <a href="{{ $resetLink }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #007bff; text-decoration: none; border-radius: 5px;">
        Reset Password
    </a>
</p>

<p style="color: black;">
    If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <br>
    <a href="{{ $resetLink }}">{{ $resetLink }}</a>
</p>

<p style="color: black;">© 2024 SGS. All rights reserved.</p>

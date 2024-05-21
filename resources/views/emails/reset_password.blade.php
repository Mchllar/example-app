<h1 style="color: black;">Reset Your Password</h1>

<p style="color: black;">You are receiving this email because we received a password reset request for your account.</p>

@component('mail::button', ['url' => $resetLink, 'color' => 'green'])
Reset Password
@endcomponent

<p style="color: black;">If you did not request a password reset, no further action is required.</p>

<p style="color: black;">Thanks,<br> SGS</p>

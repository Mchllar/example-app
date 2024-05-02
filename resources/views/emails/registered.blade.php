<h2>Your SGS Account Created</h2>
<p>
Your SGS account has been created.

Your password is: {{ $password }}

Please reset your password by clicking the button below:

@component('mail::button', ['url' => $resetLink])
Reset Password
@endcomponent

Regards,<br>
SGS
</p>
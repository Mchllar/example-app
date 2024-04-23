@component('mail::message')
# Your SGS Account Created

Your SGS account has been created.

Your password is: {{ $password }}

Please reset your password by clicking the button below:

@component('mail::button', ['url' => $resetLink])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

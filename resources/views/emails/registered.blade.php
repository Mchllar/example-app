<!DOCTYPE html>
<html>
<head>
    <title>Your SGS Account Created</title>
</head>
<body>
    <h2>Your SGS Account Created</h2>
    <p>
        Your SGS account has been created.
        <br><br>
        <strong>Your password is:</strong> {{ $password }}
        <br><br>
        For security reasons we recommend you reset your password
    </p>

    @component('mail::button', ['url' => $resetLink])
        Access your Account
    @endcomponent

    <p>
        Regards,<br>
        SGS
    </p>
</body>
</html>

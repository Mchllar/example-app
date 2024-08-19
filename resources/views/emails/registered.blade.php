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

    <p style="text-align: left;">
        <a href="{{ $resetLink }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #007bff; text-decoration: none; border-radius: 5px;">
            Reset Password
        </a>
    </p>

    <p>
        Regards,<br>
        SGS
    </p>
</body>
</html>

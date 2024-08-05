<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email Address</title>
</head>

<body>
    <h1>Welcome to Cohiva-Apps!</h1>
    <p>Hello!</p>
    <p>Please click the button below to verify your email address.</p>
    <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => $hash]) }}">Verify Email Address</a>
    <p>If you did not create an account, no further action is required.</p>
    <p>Regards,<br>Cohiva-Apps</p>
</body>

</html>

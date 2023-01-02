<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Email Verification </h1>
<p>Details Of User</p>
<ol>
    <li>Name : {{ $user['name'] }}</li>
    <li>Email : {{ $user['email'] }}</li>
    <li>Token : {{ $user['remember_token'] }}</li>
</ol>

<p>Click Here To verify mail</p>
<a href="{{ url('api/register/verify', $user['remember_token'] )}}">Click Here</a>

<p>If button not work copy this</p>
{{ $link }}{{ $user['remember_token'] }}
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the Calculator</title>
</head>
<body>
<h1>Welcome to the Calculator</h1>
@auth
    <p><a href="{{ url('/') }}">Go to Calculator</a></p>
@else
    <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to use the calculator.</p>
@endauth
</body>
</html>

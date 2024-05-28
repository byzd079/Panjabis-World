<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="login-container">

        <div>
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <div class="alert"> {{ $error }} </div>
                    @endforeach
                </div>
            @endif
        </div>

        @if (session()->has('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="form-button">Log in</button>
            <button type="button" class="form-button" onclick="window.location='{{route('register')}}'">Register</button>
        </form>
    </div>
</body>
</html>
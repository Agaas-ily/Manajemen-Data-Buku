<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container" style="max-widht:400px;">
        <h1>Login</h1>
        <form action="{{ route('loginProses') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Masukan email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Masukan password">
            </div>
            <button type="submit" class="tombol">Login</button>
        </form>
    </div>
</body>
</html>

            
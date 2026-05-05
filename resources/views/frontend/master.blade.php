<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agaily Library</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-emerald-100">
    {{--navbar--}}
    <nav class="bg-emerald-700 text-white py-4">
        <div class="container max-w-6xl mx-auto flex justify-between items-center">
            <a href="{{ route('homepage') }}" class="text-2xl font-bold">Agaily Library</a>
            <div>
                <a href="{{ route('homepage') }}" class="px-4 font-bold">Home</a>
                <a href="{{ route('login') }}" class="px-4 font-bold">Login</a>
            </div>
        </div>
    </nav>

    @yield('content')


        <footer class="text-center bg-emerald-700 text-white py-4 mt-10">
        <div class="container max-w-6xl mx-auto text-center rounded">
            <p>&copy; 2024 Agaily Library. All rights reserved. </p>
        </div>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css') 
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <!-- Card Container -->
    <div class="bg-white shadow-lg rounded-lg px-10 py-10 w-full max-w-md">
        
        <h1 class="font-bold text-center text-gray-900 mb-8 text-xl">Form Login</h1>
        
        <form action="{{ route('loginProses') }}" method="POST">
            @csrf
            
            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-gray-900 font-bold mb-2">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email.." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
            </div>

            <!-- Password Field -->
            <div class="mb-8">
                <label for="password" class="block text-gray-900 font-bold mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukan Password.." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-md shadow-md transition duration-200">
                Login
            </button>
            
        </form>
    </div> 
</body>
</html>
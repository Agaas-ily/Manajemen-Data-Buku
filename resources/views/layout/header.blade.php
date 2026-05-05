<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajemen Data Buku</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-emerald-400 text-white flex flex-col">
            <div class="p-4 text-center text-xl font-bold bg-emerald-600">
                Panel Admin
            </div>
            <nav class="flex-">
                <ul class="space-y-2 p-4">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded
                             hover:bg-emerald-600">
                            <span class="material-icons">dashboard</span>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kategori.index') }}" class="flex items-center p-2 rounded
                             hover:bg-emerald-600">
                            <span class="material-icons">folder</span>
                            <span class="ml-2">Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('penerbit.index') }}" class="flex items-center p-2 rounded
                             hover:bg-emerald-600">
                            <span class="material-icons">book</span>
                            <span class="ml-2">Penerbit</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('buku.index') }}" class="flex items-center p-2 rounded
                             hover:bg-emerald-600">
                            <span class="material-icons">library_books</span>
                            <span class="ml-2">Buku</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('anggota.index') }}" class="flex items-center p-2 rounded
                             hover:bg-emerald-600">
                            <span class="material-icons">people</span>
                            <span class="ml-2">Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('peminjaman.index') }}" class="flex items-center p-2 rounded
                             hover:bg-emerald-600">
                            <span class="material-icons">library_books</span>
                            <span class="ml-2">Peminjaman</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
                @if (Auth::check())
                    <div class="p-4 text-center">
                         <form action="{{ route('logoutProses') }}" method="post">
                         @csrf
                            <button type="submit" 
                              class="w-full bg-red-600 hover:bg-red-700 text-white py-2 
                              rounded">Logout</button>
                        </form>
                    </div>
                     @endif
            </aside>
 {{-- header Content --}}
<div class="flex-1 flex flex-col shadow">
    <header class="bg-emerald-400 shadow-md flex items-center justify-between p-4  "> 
        <h1 class="text-2xl font-bold text-white px-8 " >Aplikasi Manajemen Data Buku</h1>
        <div class="flex items-center space-x-4">
            <div class="relative group">
                <button class="flex items-center focus:outline-none ">
                      <div class="w-10 h-10 rounded-full border-2 border-white shadow-sm overflow-hidden ring-2 ring-gray-200 group-hover:ring-indigo-400">
                  <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Profil">
                   </div>
                    <span class="ml-3 text-gray-700 font-semibold group-hover:text-indigo-600 transition-colors">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-1 text-gray-400 group-hover:text-indigo-600 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                {{-- Dropdown Menu --}}
                <div class="absolute right-0 mt-1 w-48 bg-white border border-gray-200 rounded-md shadow-xl transition-all duration-150 ease-in-out opacity-0 translate-y-2 hidden group-hover:block group-hover:opacity-100 group-hover:translate-y-0">
                    <div class="py-1"> {{-- Beri padding dalam sedikit agar rapi --}}
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">Profil</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 border-b border-gray-100">Pengaturan</a>

                    </div>
                </div>
            </div>
        </div>
    </header>
    
    {{-- Main Content Area --}}
    <main class="flex-1 p-6 bg-gray-50">
                <main class="flex-1 p-6">
                    <div class="bg-white rounded-lg shadow p-6 w-full">
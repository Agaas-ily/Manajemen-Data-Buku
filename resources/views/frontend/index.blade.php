
@extends('frontend.master')
@section('title', '')

@section('content')
    {{--hero section--}}
    <section class=" bg-emerald-500  text-white py-12">
        <div class=" container max-w-6xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di Katalog Buku</h1>
            <h1 class="text-5xl font-bold mb-4">@yield('title', 'Homepage') Agaily Library</h1>
            <p class="text-lg mb-8">Temukan berbagai macam buku menarik untuk dibaca</p>
        </div>
    </section>

    {{--filter dan pencarian--}}
    <section class="container max-w-6xl mx-auto px-4 py-6">
        <form action="{{ route('homepage') }}" method="GET" class="flex items-center space-x-4 mb-6">
            <select name="kategori" class="border rounded bg-white py-2 px-4">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $kategori)
                    <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select> 
            <select name="penerbit" class="border rounded  bg-white  py-2 px-4">
                <option value="">Semua Penerbit</option>
                @foreach($penerbit as $penerbit)
                    <option value="{{ $penerbit->id }}" {{ request('penerbit') == $penerbit->id ? 'selected' : '' }}>{{ $penerbit->nama_penerbit }}</option>
                @endforeach
            </select>
            <input type="text" name="search" placeholder="Cari buku..." value="{{ request('search') }}" class="border rounded bg-white py-2 px-1 flex-1">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Cari</button>
        </form>


    {{-- Daftar Buku --}}
    <section class="container max-w-6xl mx-auto py-6 ">
        <div class="grid grid-cols-1 sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach($buku as $item)
                <div class="bg-white shadow-lg p-6 flex rounded-lg items-center space-x-4">
                <div class=" flex-shrink-0">
                    @if ($item->cover)
                    <img  src="{{ asset('storage/' . $item->cover) }}" alt="Cover Buku" class="h-18 w-16 object-cover rounded-md">
                    
                    @else
                    <img src="{{ asset('img/default_cover.jpg') }}" alt="Cover Buku" class="h-18 w-16 object-cover rounded-md">
                    @endif
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        <a href="{{ route('detail-buku', $item->id) }}" class="hover:underline hover:text-emerald-600 transition-colors">
                         {{ $item->judul }}</a>
                    </h2>
                        <p class="text-gray-600 text-sm">{{ $item->pengarang }}</p>
                        <p class="text-gray-600 text-sm">{{ $item->penerbit->nama_penerbit }}</p>
                        <p class="text-gray-600 text-sm">{{ $item->tahun_terbit }}</p>
                </div>
                </div>
            @endforeach
        </div>
            <div class="mt-5">{!! $buku->links() !!}</div>
    </section>
@endsection
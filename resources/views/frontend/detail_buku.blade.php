
@extends('frontend.master')
@section('title', 'Katalog Buku')

@section('content')
    {{--filter dan pencarian--}}
    <section class="container max-w-6xl mx-auto px-4 py-6">
            <div class="bg-white shadow-lg p-6 flex rounded-lg  space-x-4">
                <div class="w-full ">
                    @if ($buku->cover)
                    <img  src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" class="h-auto w-full object-cover rounded-md m-6">
                    
                    @else
                    <img src="{{ asset('img/default_cover.jpg') }}" alt="Cover Buku" class="h-auto w-full object-cover rounded-md m-6">
                    @endif
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-emerald-800">
                         {{ $buku->judul }}
                    </h2>
                        <p class="text-gray-600 text-sm">Pengarang: {{ $buku->pengarang }}</p>
                        <p class="text-gray-600 text-sm">Penerbit: {{ $buku->penerbit->nama_penerbit }}</p>
                        <p class="text-gray-600 text-sm">Tahun Terbit: {{ $buku->tahun_terbit }}</p>
                        <p class="text-gray-600 text-sm">Kategori: {{ $buku->kategori->nama_kategori }}</p>
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                             Aspernatur ullam alias laborum consequatur facilis. Distinctio suscipit ipsum debitis, 
                             aspernatur libero sunt assumenda corporis impedit unde rerum necessitatibus eum, quo est.</p>

                            <a href="{{ route('homepage') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg mt-6">
                                 Kembali ke Katalog
                            </a>
                </div>
                </div>
        </div>
    </section>
@endsection


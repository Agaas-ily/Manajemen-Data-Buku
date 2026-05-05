@include('layout.header')
<h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Transaksi Peminjaman Buku</h3>
<form action="{{route('peminjaman.store')}}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="" class="block text-emerald-700 font-bold mb-2">Tanggal Peminjaman</label>
        <input type="date" name="tanggal_pinjam" class="border border-gray-300 rounded py-2 px-4" value="{{ date('Y-m-d') }}" >
    </div>
    <div class="mb-4">
        <label for="" class="block text-emerald-700 font-bold mb-2">Nama Anggota</label>
        <select name="anggota_id" id="" class="border border-gray-300 rounded py-2 px-4">
            @foreach ($anggota as $a)
                <option value="{{ $a->id }}">{{ $a->nama_anggota }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <h3 class="font-bold mb-2">Katalog Buku</h3>
        <div class="overflow-y-auto h-64 border border-gray-300 rounded">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-4">
                @foreach ($bukus as $buku)
                    <div class="flex flex-col items-center border border-gray-300 rounded p-4 shadow-sm">
                        @if ($buku->cover)
                            <img src="{{ asset('storage/' . $buku->cover) }}" alt="cover" class="w-32 h-48 object-cover mb-4">
                        @else
                            <img src="{{ asset('img/default_cover.jpg') }}" alt="cover" class="w-32 h-48 object-cover mb-4">
                        @endif
                        <div class="flex flex-col items-center">
                          <input type="checkbox" name="buku_ids[]" value="{{ $buku->id }}" class="form-checkbox h-5 w-5 text-blue-600"><span class="ml-2 text-gray-700">{{ $buku->judul }}</span>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
<button type="submit" class="tombol_hijau">Simpan</button>
</form>
@include('layout.footer')
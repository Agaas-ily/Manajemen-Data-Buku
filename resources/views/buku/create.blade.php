@include('layout.header')
    <h3 class="judul_h3">Buat Buku</h3>
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Buku</label> 
            <input type="text" name="judul" id="judul" placeholder="Masukan Judul Buku" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label  for="pengarang" class="block text-gray-700 font-bold mb-2">Pengarang</label> 
            <input type="text" name="pengarang" id="pengarang" placeholder="Masukan Pengarang" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label for ="tahun_terbit" class="block text-gray-700 font-bold mb-2">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Masukan Tahun Terbit" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label for="penerbit_id" class="block text-gray-700 font-bold mb-2">Penerbit</label>
            <select name="penerbit_id" id="penerbit_id" class="border border-gray-300 rounded py-2 px-4">
                <option value="">Pilih Penerbit</option>
                 @foreach($penerbit as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="kategori_id" class="block text-gray-700 font-bold mb-2">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="border border-gray-300 rounded py-2 px-4">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="file_cover" class="block text-gray-700 font-bold mb-2">Cover Buku</label>
            <input type="file" name="file_cover" id="file_cover" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <button type="submit" class="tombol_hijau">Simpan</button>
    </form>
@include('layout.footer')
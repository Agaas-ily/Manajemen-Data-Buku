@include('layout.header')
    <h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Buat Kategori</h3>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label  for=""class="block text-gray-700 font-bold mb-2">Nama Kategori</label> 
            <input type="text" name="nama_kategori" id="" placeholder="Masukan Nama Kategori" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <button type="submit" class="tombol_hijau">Simpan</button>
    </form>
@include('layout.footer')
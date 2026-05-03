@include('layout.header')
    <h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Tambah Anggota</h3>
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf   
        <div class="mb-4">
            <label  for=""class="block text-gray-700 font-bold mb-2">Nama Anggota</label> 
            <input type="text" name="nama_anggota" id="" placeholder="Masukan Nama Anggota" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label  for=""class="block text-gray-700 font-bold mb-2">Alamat</label> 
            <input type="text" name="alamat" id="" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label  for=""class="block text-gray-700 font-bold mb-2">No Telepon</label> 
            <input type="text" name="no_telepon" id="" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <button type="submit" class="tombol_hijau">Simpan</button>
    </form>
@include('layout.footer')
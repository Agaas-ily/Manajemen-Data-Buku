@include('layout.header')
    <h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Edit Anggota</h3>
    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label  for="nama_anggota" class="block text-blue-500 font-bold mb-2">Nama Anggota</label> 
            <input type="text" name="nama_anggota" id="nama_anggota" value="{{ $anggota->nama_anggota }}" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label  for="alamat" class="block text-blue-500 font-bold mb-2">Alamat</label> 
            <input type="text" name="alamat" id="alamat"  class="border border-gray-300 rounded py-2 px-4" value="{{ $anggota->alamat }}">
        </div>
        <div class="mb-4">
            <label  for="no_telepon" class="block text-blue-500 font-bold mb-2">No Telepon</label> 
            <input type="text" name="no_telepon" id="no_telepon" class="border border-gray-300 rounded py-2 px-4" value="{{ $anggota->no_telepon }}">
        </div> 
        <button type="submit" class="tombol_hijau">Simpan</button>
    </form>
@include('layout.footer')
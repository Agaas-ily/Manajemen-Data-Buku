@include('layout.header')
    <h3 class="judul_h3">Edit Penerbit</h3>
    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label  for="" class="block text-gray-700 font-bold mb-2">Nama Penerbit</label> 
            <input type="text" name="nama_penerbit" id="" value="{{ $penerbit->nama_penerbit }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit" class="tombol_hijau">Simpan</button>
    </form>
@include('layout.footer')
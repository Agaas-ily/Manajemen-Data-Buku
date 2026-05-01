@include('layout.header')
    <h3 class="judul_h3">Edit Buku</h3>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
               <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Buku</label> 
            <input type="text" name="judul" id="judul" value="{{ $buku->judul }}" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label  for="pengarang" class="block text-gray-700 font-bold mb-2 ">Pengarang</label> 
            <input type="text" name="pengarang" id="pengarang" value="{{ $buku->pengarang }}" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label for="tahun_terbit" class="block text-gray-700 font-bold mb-2">Tahun TTerbit</label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="border border-gray-300 rounded py-2 px-4">
        </div>
        <div class="mb-4">
            <label for="penerbit_id" class="block text-gray-700 font-bold mb-2">Penerbit</label>
            <select name="penerbit_id" id="penerbit_id" class="border border-gray-300 rounded py-2 px-4">
                @foreach($penerbit as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $buku->penerbit_id ? 'selected' : '' }}>
                        {{ $p->nama_penerbit }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="kategori_id" class="block text-gray-700 font-bold mb-2">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="border border-gray-300 rounded py-2 px-4">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $k->id == $buku->kategori_id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="file_cover" class="block text-gray-700 font-bold mb-2">Cover Buku</label>
            @if($buku->cover)
                <div>
                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" width="150">
                </div>
            @endif
            <input type="file" name="file_cover" id="file_cover" class="border border-gray-300 rounded py-2 px-4">
        </div >
        <input type="hidden" name="cover_lama" value="{{ $buku->cover }}">
        <button type="submit" class="tombol_hijau">Update</button>
    </form>
@include('layout.footer')
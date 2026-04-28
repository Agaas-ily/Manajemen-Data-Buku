@include('layout.header')
    <h3>Buat Buku</h3>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Judul Buku</label> 
            <input type="text" name="judul" id="" placeholder="Masukan Judul Buku">
        </div>
        <div class="form-group">
            <label  for="">Pengarang</label> 
            <input type="text" name="pengarang" id="" placeholder="Masukan Pengarang">
        </div>
        <div class="form-group">
            <label for ="">Tahun T erbit</label>
            <input type="text" name="tahun_terbit" id="" placeholder="Masukan Tahun Terbit">
        </div>
        <div class="form-group">
            <label for="">Penerbit</label>
            <select name="penerbit_id" id="">
                <option value="">Pilih Penerbit</option>
                 @foreach($penerbit as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="kategori_id" id="">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="tombol">Simpan</button>
    </form>
@include('layout.footer')
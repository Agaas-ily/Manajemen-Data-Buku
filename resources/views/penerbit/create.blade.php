@include('layout.header')
    <h3>Buat Penerbit</h3>
    <form action="{{ route('penerbit.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label  for="">Nama Penerbit</label> 
            <input type="text" name="nama_penerbit" id="" placeholder="Masukan Nama Penerbit">
        </div>
        <button type="submit" class="tombol">Simpan</button>
    </form>
@include('layout.footer')
@include('layout.header')
    <h3>edit Penerbit</h3>
    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label  for="">Nama Penerbit</label> 
            <input type="text" name="nama_penerbit" id="" value="{{ $penerbit->nama_penerbit }}">
        <button type="submit" class="tombol">Simpan</button>
    </form>
@include('layout.footer')
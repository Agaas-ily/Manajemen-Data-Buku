@include('layout.header')
    <h3 style="text-align: center;">Daftar Kategori</h3>
    <div style="text-align: center;">
        <a href ="{{ route('kategori.create') }}" class="tombol">Tambah Kategori</a>
    </div>
    <table>
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Nama Kategori</th>
                <th style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allkategori as $key => $r)
            <tr>
                <td style="text-align: center">{{ $key + 1 }}</td>
                <td style="text-align: center">{{ $r->nama_kategori }}</td>
                <td style="text-align: center">
                    <form action="{{ route('kategori.destroy', $r->id) }}" method="POST">
                        <a href="{{ route('kategori.show', $r->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('kategori.edit', $r->id) }}" class="tombol">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@include('layout.footer')
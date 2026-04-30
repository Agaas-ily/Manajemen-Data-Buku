@include('layout.header')
    <h3 style="text-align: center;">Daftar Buku</h3>
    <div style="text-align: center;">
        <a href ="{{ route('buku.create') }}" class="tombol">Tambah Buku</a>
    </div>
    <table>
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Cover</th>
                <th style="text-align: center">Judul Buku</th>
                <th style="text-align: center">Pengarang</th>
                <th style="text-align: center">Penerbit</th>
                <th style="text-align: center">Tahun Terbit</th>
                <th style="text-align: center">Kategori</th>
                <th style="text-align: center" width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allbuku as $key => $r)
            <tr>
                <td style="text-align: center">{{ $key + 1 }}</td>
                <td><img src="{{ asset('storage/' . $r->cover) }}" alt="Cover Buku" width="200"></td>
                <td style="text-align: center">{{ $r->judul }}</td> 
                <td style="text-align: center">{{ $r->pengarang }}</td>
                <td style="text-align: center">{{ $r->penerbit->nama_penerbit }}</td>
                <td style="text-align: center">{{ $r->tahun_terbit }}</td>
                <td style="text-align: center">{{ $r->kategori->nama_kategori }}</td>
                <td style="text-align: center">
                    <form action="{{ route('buku.destroy', $r->id) }}" method="POST">
                        <a href="{{ route('buku.show', $r->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('buku.edit', $r->id) }}" class="tombol">Edit</a>
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
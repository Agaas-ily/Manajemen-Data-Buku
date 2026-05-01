@include('layout.header')
    <h3 class="judul_h3">Daftar Buku</h3>
    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; align-items:center;">
        <a href ="{{ route('buku.create') }}" class="tombol_biru">Tambah Buku</a>
        <form action="{{ route('buku.index') }}" method="get">
            <input type="text" name="q" id="" class="border border-gray-300 rounded py-2 px-4" placeholder="Pengarang\Penerbit\Tahun\Buku...">
            <button type="submit" class="tombol_hijau">Cari</button>
        </form>
    </div>
    
    <table class="table_1">
        <thead>
            <tr class="bg-gray-200">
                <th class="custom_th">No</th>
                <th class="custom_th">Cover</th>
                <th class="custom_th">Judul Buku</th>
                <th class="custom_th">Pengarang</th>
                <th class="custom_th">Penerbit</th>
                <th class="custom_th">Tahun Terbit</th>
                <th class="custom_th">Kategori</th>
                <th class="custom_th" width="300">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allBuku as $key => $r)
            <tr>
                <td class="custom_td">{{ $key + $allBuku->firstItem() }}</td>
                <td class="custom_td"><img src="{{ asset('storage/' . $r->cover) }}" alt="Cover Buku" width="200"></td>
                <td class="custom_td">{{ $r->judul }}</td> 
                <td class="custom_td">{{ $r->pengarang }}</td>
                <td class="custom_td">{{ $r->penerbit->nama_penerbit }}</td>
                <td class="custom_td" style="text-align: center">{{ $r->tahun_terbit }}</td>
                <td class="custom_td" style="text-align: center">{{ $r->kategori->nama_kategori }}</td>
                <td class="custom_td" style="text-align: center">
                    <form action="{{ route('buku.destroy', $r->id) }}" method="POST">
                        <a href="{{ route('buku.show', $r->id) }}" class="tombol_hijau">Detail</a>
                        <a href="{{ route('buku.edit', $r->id) }}" class="tombol_biru">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol_merah">Hapus</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-bottom: 10px;">
        {{$allBuku->links('vendor.pagination.tailwind') }}
    </div>
@include('layout.footer')

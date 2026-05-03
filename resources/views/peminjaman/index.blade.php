@include('layout.header')
<h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Tambah Peminjaman</h3>
<div class="flex items-center justify-between mb-4">
    <h2 class="text-xl font-bold"> Peminjaman Buku</h2>
    <a href="{{ route('peminjaman.create') }}" class="tombol_biru">Tambah Peminjaman</a>
</div>
<table class="table_1">
    <thead>
        <tr>
            <th class="px-4 py-2">No.</th>
            <th class="px-4 py-2">Tanggal Pinjam</th>
            <th class="px-4 py-2">Nama Anggota</th>
            <th class="px-4 py-2">Status Pengembalian</th>
            <th class="px-4 py-2">Aksi  </th>
        </tr>
    </thead>
    <tbody>
        @foreach($allPeminjaman as $key => $r)
        <tr>
            <td class="custom_td">{{ $key + 1 }}</td>
            <td class="custom_td">{{ $r->tanggal_pinjam }}</td>
            <td class="custom_td">{{ $r->anggota->nama_anggota }}</td>
            <td class="custom_td">{{ $r->status }}</td>
            <td class="custom_td">
                <form action="{{ route('peminjaman.destroy', $r->id) }}" method="POST">
                    <a href="{{ route('peminjaman.show', $r->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Detail</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('layout.footer')
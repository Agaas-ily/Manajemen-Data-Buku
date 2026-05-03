@include('layout.header')
<div class="flex items-center justify-between">
    <h3 class="font-bold mb-1 pb-3 text-xl" style="text-align: center;">Detail Peminjaman</h3>
    <a href="{{ route('peminjaman.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Kembali</a>
</div>
<div class="mb-4  pa-4  bg-gray-100">
    <p><strong>Tanggal Peminjaman:</strong> {{ $peminjaman->tanggal_pinjam }}</p>
    <p><strong>Nama Anggota:</strong> {{ $peminjaman->anggota->nama_anggota }}</p>
    <p><strong>Status Pengembalian:</strong> {{ $peminjaman->status }}</p>
</div>
<div class="overflow-x-auto">
    <table class="table_1">
        <thead>
            <tr clas=s="bg-gray-200">
                <th class="px-4 py-2">No.</th>
                <th class="px-4 py-2">Judul Buku</th>
                <th class="px-4 py-2">Pengarang</th>
                <th class="px-4 py-2">Penerbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman->bukus as $key => $buku)
            <tr>
                <td class="custom_td">{{ $key + 1 }}</td>
                <td class="custom_td">{{ $buku->judul_buku }}</td>
                <td class="custom_td">{{ $buku->pengarang }}</td>
                <td class="custom_td">{{ $buku->penerbit->nama_penerbit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>  
    @if($peminjaman->status === 'dipinjam')
        <div class="my-4  p-4">
            <h3 class="font-bold mb-2 text-lg">Pengembalian Buku</h3>
            <form action ={{ route('peminjaman.update', $peminjaman->id) }} method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                <label for="status_pengembalian" class="block mb-2 font-bold">Tanggal Pengembalian:</label>
                <input type="date" name="tanggal_kembali" value= {{date('Y-m-d')}} class="border rounded py-2 px-4 ">
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Proses Pengembalian</button>
            </form>
        </div>
    @endif
@include('layout.footer')
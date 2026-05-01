@include('layout.header')
    <h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Daftar Kategori</h3>
    <div style="text-align: center;">
        <a href ="{{ route('kategori.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Tambah Kategori</a>
    </div>
    <table class="table_1">
        <thead>
            <tr class="bg-gray-200">
                <th class="custom_th">No</th>
                <th class="custom_th">Nama Kategori</th>
                <th class="custom_th">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allkategori as $key => $r)
            <tr>
                <td class="custom_td">{{ $key + 1 }}</td>
                <td class="custom_td">{{ $r->nama_kategori }}</td>
                <td class="custom_td">
                    <form action="{{ route('kategori.destroy', $r->id) }}" method="POST">
                        <a href="{{ route('kategori.show', $r->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Detail</a>
                        <a href="{{ route('kategori.edit', $r->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Edit</a>
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
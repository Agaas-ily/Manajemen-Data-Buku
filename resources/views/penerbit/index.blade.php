@include('layout.header')
<h3 class="judul_h3">Daftar Penerbit</h3>
    <div style="margin-bottom: 20px;">
    <a href="{{ route('penerbit.create') }}" class="tombol_hijau">Tambah Penerbit</a>
    </div>
    <table class="table_1">
        <thead>
            <tr class="bg-gray-200" >
                <th class="px-4 py-2 text-center">No</th>
                <th class="px-4 py-2 text-center">Nama Penerbit</th>
                <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allpenerbit as $key => $r)
            <tr>
                <td class=custom_td>{{ $key + 1 }}</td>
                <td class=custom_td>{{ $r->nama_penerbit }}</td>
                <td class=custom_td >
                    <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST">
                        <a href="{{ route('penerbit.edit', $r->id) }}" class="tombol_hijau">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol_merah">Hapus</button> 
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
@include('layout.footer')
@include('layout.header')
<h3 style="text-align: center;">Daftar Penerbit</h3>
    <div style="text-align: center;">
    <a href="{{ route('penerbit.create') }}" class="tombol">Tambah Penerbit</a>
    </div>
    <table>
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th style="text-align: center">Nama Penerbit</th>
                <th style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allpenerbit as $key => $r)
            <tr>
                <td style="text-align: center">{{ $key + 1 }}</td>
                <td style="text-align: center">{{ $r->nama_penerbit }}</td>
                <td style="text-align: center">
                    <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST">
                        <a href="{{ route('penerbit.edit', $r->id) }}" class="tombol">Edit</a>
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
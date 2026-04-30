@include('layout.header')
    <h3>Detail Buku</h3>

    @if ($buku->cover)
        <div style="text-align: center;">
        <img src="{{ asset('storage/' . $buku->cover) }}" alt ="Cover Buku" style="max-width: 300px; max-height: 300px;">  
        </div>
    @endif

    <table>
        <tbody>
            <tr>
                <td width="150px">Judul Buku</td>
                <td width="2px">:</td>
                <td>{{ $buku->judul }}</td> 
            </tr>
            <tr>
                <td>Pengarang</td>
                <td width="2px">:</td>
                <td>{{ $buku->pengarang }}</td> 
            </tr>
            <tr>
                <td>Penerbit</td>
                <td width="2px">:</td>
                <td>{{ $buku->penerbit->nama_penerbit }}</td> 
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td width="2px">:</td>
                <td>{{ $buku->tahun_terbit }}</td> 
            </tr>
            <tr>
                <td>Kategori</td>
                <td width="2px">:</td>
                <td>{{ $buku->kategori->nama_kategori }}</td> 
            </tr>
        </tbody>
    </table>
@include('layout.footer')
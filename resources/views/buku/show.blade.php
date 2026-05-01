@include('layout.header')
    <h3 class="judul_h3">Detail Buku</h3>

    @if ($buku->cover)
        <div style="text-align: center;">
        <img src="{{ asset('storage/' . $buku->cover) }}" alt ="Cover Buku" style="max-width: 300px; max-height: 300px;" class="center">  
        </div>
    @endif

    <table class="table_1" style="margin-top: 20px;">
        <tbody class="text-center">
            <tr>
                <td width="150px" class="font-bold" >Judul Buku</td>
                <td width="2px " class="font-bold">:</td>
                <td class="px-4 py-2 text-center">{{ $buku->judul }}</td> 
            </tr>
            <tr>
                <td class="font-bold">Pengarang</td>
                <td width="2px" class="font-bold">:</td>
                <td class="px-4 py-2 text-center">{{ $buku->pengarang }}</td> 
            </tr>
            <tr>
                <td class="font-bold">Penerbit</td>
                <td width="2px" class="font-bold">:</td>
                <td class="px-4 py-2 text-center">{{ $buku->penerbit->nama_penerbit }}</td> 
            </tr>
            <tr>
                <td class="font-bold">Tahun Terbit</td>
                <td width="2px" class="font-bold">:</td>
                <td class="px-4 py-2 text-center">{{ $buku->tahun_terbit }}</td> 
            </tr>
            <tr>
                <td class="font-bold">Kategori</td>
                <td width="2px" class="font-bold">:</td>
                <td class="px-4 py-2 text-center">{{ $buku->kategori->nama_kategori }}</td> 
            </tr>
        </tbody>
    </table>
@include('layout.footer')
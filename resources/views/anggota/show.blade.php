@include('layout.header')
    <div class="flex justify-between">
    <h3 class="font-bold mb-1 border-b pb-3 text-xl" style="text-align: center;">Detail Anggota</h3>
    <a href="{{ route('anggota.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Kembali</a>
    </div>
    <table class="table_1">
        <tbody>
            <tr>
                <td width="150px" class="px-4 py-2 font-bold bg-gray-200 text-center">Nama Anggota</td>
                <td width="2px" class="px-4 py-2 text-center">:</td>
                <td class="">{{ $anggota->nama_anggota }}</td> 
            </tr>
            <tr>
                <td width="150px" class="px-4 py-2 font-bold bg-gray-200 text-center">Alamat</td>
                <td width="2px" class="px-4 py-2 text-center">:</td>
                <td class="">{{ $anggota->alamat }}</td> 
            </tr>
            <tr>
                <td width="150px" class="px-4 py-2 font-bold bg-gray-200 text-center">No Telepon</td>
                <td width="2px" class="px-4 py-2 text-center">:</td>
                <td class="">{{ $anggota->no_telepon }}</td> 
            </tr>
        </tbody>
    </table>
@include('layout.footer')
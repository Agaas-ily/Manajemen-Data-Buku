@include('layout.header')
    <h3 class="font-bold mb-4 border-b pb-3 text-xl" style="text-align: center;">Detail Kategori</h3>
    <table class="table_1">
        <tbody>
            <tr>
                <td width="150px" class="px-4 py-2 bg-gray-200 text-center">Nama Kategori</td>
                <td width="2px" class="px-4 py-2 text-center">:</td>
                <td class="px-4 py-2 text-center">{{ $kategori->nama_kategori }}</td> 
            </tr>
        </tbody>
    </table>
@include('layout.footer')
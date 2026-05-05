@include('layout.header')
 <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
    {{-- Baris Kartu Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Kartu Kategori -->
        <div class="bg-emerald-200 border-2 border-emerald-400 p-6 rounded-xl shadow-sm text-center">
            <h3 class="text-gray-700 font-bold text-lg">Total Kategori</h3>
            <p class="text-4xl font-black text-emerald-800">{{ $data['jmlKategori'] }}</p>
        </div>
        <!-- Kartu Penerbit -->
        <div class="bg-red-200 border-2 border-red-400 p-6 rounded-xl shadow-sm text-center">
            <h3 class="text-gray-700 font-bold text-lg">Total Penerbit</h3>
            <p class="text-4xl font-black text-red-800">{{ $data['jmlPenerbit'] }}</p>
        </div>
        <!-- Kartu Buku -->
        <div class="bg-blue-200 border-2 border-blue-400 p-6 rounded-xl shadow-sm text-center">
            <h3 class="text-gray-700 font-bold text-lg">Total Buku</h3>
            <p class="text-4xl font-black text-blue-800">{{ $data['jmlBuku'] }}</p>
        </div>
        <!-- Kartu Anggota -->
        <div class="bg-yellow-200 border-2 border-yellow-400 p-6 rounded-xl shadow-sm text-center">
            <h3 class="text-gray-700 font-bold text-lg">Total Anggota</h3>
            <p class="text-4xl font-black text-yellow-800">{{ $data['jmlAnggota'] }}</p>
        </div>
    </div>

    {{-- Section Grafik --}}
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Buku Per Kategori</h3>
        <div class="h-80">
            <canvas id="kategoriChart"></canvas>
        </div>
    </div>

    {{-- Section Welcome Message --}}
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600 mt-2">Gunakan panel ini untuk mengelola data buku, kategori, dan transaksi perpustakaan Anda dengan mudah.</p>
    </div>
</main>
<script>
    const ctx = document.getElementById('kategoriChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($kategoriLabels) !!},
            datasets: [{
                label: 'Jumlah Buku',
                data: {!! json_encode($kategoriData) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.5)', 
                borderColor: 'rgb(59, 130, 246)',
                borderWidth: 2,
                borderRadius: 8, 
                hoverBackgroundColor: 'rgb(59, 130, 246)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });
</script>
@include('layout.footer')
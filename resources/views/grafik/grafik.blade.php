<x-layouts>
   <script>
        const dataPenyakit = @json($dataPenyakit);
    </script>
     <div id="test" class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">
            <h1 class="text-center font-bold text-lg mb-6">
                Grafik Penyakit Terbanyak Tahun 2023 di Kabupaten Indramayu
            </h1>
            
             <canvas id="penyakitChart" height="100"></canvas>
           
            <div class="mt-6">
                <a href="/pelaporan" class="text-blue-600 hover:underline">Ke Form Pelaporan Penyakit</a>
            </div>
        </div>
</x-layouts>

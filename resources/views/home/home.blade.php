<x-layouts>
    <script>
        const dataPenyakit = @json($dataPenyakit);
    </script>

    <section>
        <x-header />
    </section>

    <!-- Grafik Penyakit -->
    <section>
        <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                Grafik Penyakit Terbanyak Tahun 2023 <br> di Kabupaten Indramayu
            </h1>

            <canvas id="penyakitChart" height="100"></canvas>

            <div class="mt-6 text-center">
                <a href="{{ route('pelaporan.index') }}" class="text-blue-600 font-medium hover:underline">
                    ➜ Ke Form Pelaporan Penyakit
                </a>
            </div>
        </div>
    </section>

    <!-- Artikel Slider -->
    <section class="bg-sky-100 py-12 px-4 mt-16">
        <h2 class="text-2xl font-bold text-center text-sky-800 mb-8">Artikel Kesehatan Terbaru</h2>

        <div class="relative max-w-7xl mx-auto">
            <!-- Tombol Kiri -->
            <button id="scrollLeft"
                class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white p-3 rounded-full shadow hover:bg-sky-200 transition">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Container Artikel -->
            <div id="cardContainer" class="flex gap-6 overflow-x-auto px-10 scroll-smooth">
                @foreach ($dataArtikel as $artikel)
                    <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0 hover:shadow-lg transition">
                        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}"
                            class="rounded-md mb-4 w-full h-40 object-cover">
                        <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $artikel->judul }}</h3>
                        <p class="text-sm text-gray-600">
                            {{ Str::limit(strip_tags($artikel->isi), 100, '...') }}
                        </p>
                        <a href="{{ route('artikel.show', $artikel->id) }}"
                            class="text-blue-600 text-sm mt-2 inline-block hover:underline">
                            ➜ Selengkapnya
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Kanan -->
            <button id="scrollRight"
                class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white p-3 rounded-full shadow hover:bg-sky-200 transition">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    <script>
        const container = document.getElementById('cardContainer');
        document.getElementById('scrollLeft').addEventListener('click', () => {
            container.scrollBy({ left: -300, behavior: 'smooth' });
        });
        document.getElementById('scrollRight').addEventListener('click', () => {
            container.scrollBy({ left: 300, behavior: 'smooth' });
        });
    </script>
</x-layouts>

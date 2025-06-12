<header>
    <div class="w-full bg-sky-200 p-10">
        <div class="pt-5 pl-2 flex">
            <div class="w-full relative">
                <div class="mb-4">
                    <h3 class="text-xl mb-4">Selamat datang di</h3>
                    <h1 class="text-4xl font-bold">Aplikasi Monitoring Layanan Kesehatan</h1>
                    <h1 class="text-4xl font-bold">Masyarakat Kabupaten Indramayu</h1>
                </div>
                <div class="flex items-center bg-white rounded-full px-3 py-1 shadow w-[350px] relative">
                    <!-- Ikon pencarian -->
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path>
                    </svg>

                    <!-- Input -->
                    <input id="searchInput" type="text" placeholder="Layanan Kesehatan Terdekat?"
                        class="flex-1 px-2 py-2 text-sm text-gray-700 bg-transparent focus:outline-none placeholder-gray-400" />

                     <!-- Hasil pencarian -->
                    <div id="searchResults"
                        class="absolute top-full mt-1 left-0 bg-white shadow rounded-md w-full max-h-60 overflow-y-auto z-10 hidden">
                        <!-- JS akan isi hasil di sini -->
                    </div>

                    <!-- Tombol -->
                    <button
                        class="bg-blue-400 text-white text-sm font-semibold px-4 py-1.5 rounded-full hover:bg-blue-500 transition">
                        Cari
                    </button>
                </div>
            </div>
            <div class="flex justify-end w-1/2 gap-10">
                <div class="flex items-center">
                    <img src="{{ asset('images/gambar1.jpg') }}" alt="" width="150">
                </div>
                <div>
                    <img src="{{ asset('images/gambar1.jpg') }}" alt="" width="250">
                </div>
            </div>
        </div>
    </div>
</header>

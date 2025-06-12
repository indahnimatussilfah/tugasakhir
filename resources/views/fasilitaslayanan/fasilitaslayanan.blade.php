<x-layouts>
    <div class="bg-blue-100 py-10 px-4 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <p class="text-lg">Selamat datang di</p>
            <h1 class="text-3xl md:text-4xl font-bold mb-6">
                Aplikasi Monitoring Layanan Kesehatan Masyarakat Kabupaten Indramayu
            </h1>

            <div class="w-full md:w-2/3">
                <label for="fasilitas" class="block mb-2 font-semibold text-gray-700">
                    Cari Fasilitas Layanan Kesehatan:
                </label>
                <input
                    list="fasilitas-options"
                    id="fasilitas"
                    name="fasilitas"
                    class="w-full border border-gray-300 rounded-md px-4 py-2"
                    placeholder="Ketik nama fasilitas..."
                >
            </div>
        </div>
    </div>
</x-layouts>

<x-layouts>

    <div class="container mx-auto mt-6">
        {{-- Informasi Layanan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-2">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $dataItem['nama_layanan'] }}</h2>
                <p><span class="font-medium">Alamat:</span> {{ $dataItem['alamat'] }}</p>
                <p><span class="font-medium">Telepon:</span> {{ $dataItem['telepon'] }}</p>
                <p><span class="font-medium">Deskripsi:</span> {{ $dataItem['deskripsi'] }}</p>
            </div>
            {{-- Gambar --}}
            <div>
                <img src="{{ $dataItem['foto'] }}" alt="Foto Layanan"
                    class="w-full h-64 object-cover rounded-lg shadow">
            </div>
        </div>

        {{-- Placeholder Peta --}}
        <div class="w-full h-[400px] bg-gray-200 rounded-lg flex items-center justify-center text-gray-600">
            <div id="map" class="w-full h-[400px] mt-4 rounded-lg shadow"></div>
        </div>
    </div>

</x-layouts>

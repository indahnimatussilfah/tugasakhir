<x-layouts>
    <div class="w-full max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">
        <h2 class="text-xl font-semibold mb-4">Form Pelaporan Penyakit</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelaporan.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block font-medium">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full border rounded-md p-2"
                       placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}" required>
                <small class="text-gray-500">Contoh: Andi Pratama</small>
            </div>

            <!-- Gejala Umum -->
            <div>
                <label for="gejala" class="block font-medium mb-1">Gejala Umum</label>
                <div class="border border-gray-300 p-3 rounded-md grid grid-cols-1 md:grid-cols-2 gap-x-4">
                    @php
                        $selectedGejala = old('gejala', []);
                    @endphp
                    @foreach ([
                        'Demam', 'Batuk', 'Sesak Napas', 'Mual', 'Sakit Kepala',
                        'Nyeri Otot', 'Kelelahan', 'Diare', 'Sakit Tenggorokan',
                        'Pilek', 'Hilang Indra Penciuman/Rasa'
                    ] as $gejala)
                        <label class="block">
                            <input type="checkbox" name="gejala[]" value="{{ $gejala }}" {{ in_array($gejala, $selectedGejala) ? 'checked' : '' }}>
                            {{ $gejala }}
                        </label>
                    @endforeach
                </div>
                <small class="text-gray-500">Pilih satu atau lebih gejala yang Anda alami</small>
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block font-medium">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="w-full border rounded-md p-2"
                          placeholder="Tuliskan informasi tambahan jika ada, seperti durasi gejala atau riwayat perjalanan">{{ old('keterangan') }}</textarea>
                <small class="text-gray-500">Contoh: Gejala sudah muncul sejak 3 hari yang lalu</small>
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Kirim
            </button>
        </form>

        <div class="mt-6">
            <a href="/" class="text-blue-600 hover:underline">Kembali ke Home</a>
        </div>
    </div>
</x-layouts>

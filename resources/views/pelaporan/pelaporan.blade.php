<x-layouts>
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">
        <h2 class="text-xl font-semibold mb-4">Form Pelaporan Penyakit</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pelaporan.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama" class="block font-medium">Nama</label>
                <input type="text" id="nama" name="nama" class="w-full border rounded-md p-2" required>
            </div>

            <div>
                <label for="gejala" class="block font-medium mb-1">Gejala Umum</label>
                <div class="border border-gray-300 p-3 rounded-md">
                    <label class="block"><input type="checkbox" name="gejala[]" value="Demam"> Demam</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Batuk"> Batuk</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Sesak Napas"> Sesak Napas</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Mual"> Mual</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Sakit Kepala"> Sakit Kepala</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Nyeri Otot"> Nyeri Otot</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Kelelahan"> Kelelahan</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Diare"> Diare</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Sakit Tenggorokan"> Sakit Tenggorokan</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Pilek"> Pilek</label>
                    <label class="block"><input type="checkbox" name="gejala[]" value="Hilang Indra Penciuman/Rasa"> Hilang Indra Penciuman/Rasa</label>
                </div>
            </div>

            <div>
                <label for="keterangan" class="block font-medium">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="w-full border rounded-md p-2"></textarea>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Kirim</button>
        </form>

        <div class="mt-6">
            <a href="/" class="text-blue-600 hover:underline">Kembali ke Home</a>
        </div>
    </div>
</x-layouts>

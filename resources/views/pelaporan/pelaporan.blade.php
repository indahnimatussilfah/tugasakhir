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
                <label for="gejala">Gejala</label><br>
                <div style="border: 1px solid #ccc; padding: 10px; border-radius: 6px;">
                    <label><input type="checkbox" name="gejala[]" value="Demam"> Demam</label><br>
                    <label><input type="checkbox" name="gejala[]" value="Batuk"> Batuk</label><br>
                    <label><input type="checkbox" name="gejala[]" value="Sesak Napas"> Sesak Napas</label><br>
                    <label><input type="checkbox" name="gejala[]" value="Mual"> Mual</label><br>
                    <label><input type="checkbox" name="gejala[]" value="Sakit Kepala"> Sakit Kepala</label><br>
                    <label><input type="checkbox" name="gejala[]" value="Nyeri Otot"> Nyeri Otot</label><br>
                </div><br>

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

<x-layouts>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Detail Tanggapan Petugas</h2>

        <div class="mb-4">
            <strong>Nama Petugas:</strong>
            <p class="text-gray-700">{{ $data['nama_petugas'] ?? '-' }}</p>
        </div>

        <div class="mb-4">
            <strong>Pesan:</strong>
            <p class="text-gray-700">{{ $data['message'] ?? '-' }}</p>
        </div>

        <div class="mb-4">
            <strong>Jawaban / Pengobatan:</strong>
            <div class="p-4 bg-gray-100 border rounded text-gray-800">
                {{ $data['jawaban'] ?? 'Belum ada jawaban dari petugas.' }}
            </div>
        </div>

        <a href="{{ route('notifikasi.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">← Kembali ke Notifikasi</a>
    </div>
</x-layouts>

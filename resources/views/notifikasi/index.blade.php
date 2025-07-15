<x-layouts>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Semua Notifikasi</h2>

        @if ($notifications->count())
            <form method="POST" action="{{ route('notifikasi.markAllAsRead') }}" class="mb-4">
                @csrf
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Tandai Semua Sudah Dibaca
                </button>
            </form>
        @endif

        @forelse ($notifications as $notif)
            <div class="border-b py-4 {{ $notif->read_at ? 'text-gray-500' : 'font-semibold' }}">
                <div class="text-gray-500 text-sm">{{ $notif->created_at->diffForHumans() }}</div>
                <div>{{ $notif->data['message'] ?? '-' }}</div>
                <a href="{{ route('notifikasi.show', $notif->id) }}">Lihat Detail</a>
            </div>
        @empty
            <p class="text-gray-600">Tidak ada notifikasi.</p>
        @endforelse
    </div>
</x-layouts>

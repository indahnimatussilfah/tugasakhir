<nav class="p-4 rounded-xl bg-white shadow-md ">
    <ul class="flex justify-end gap-10 pr-32">
        <li>
            <a href="{{ route('home.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Home</a>
        </li>
        <li>
            <a href="{{ route('artikel.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Artikel</a>
        </li>
        <li>
            <a href="{{ route('grafik.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Grafik</a>
        </li>
        <li>
            <a href="{{ route('pelaporan.index') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Pelaporan</a>
        </li>
        <li>
        <li class="relative">
            <button id="notifBtn" class="relative focus:outline-none">
                <!-- Ikon lonceng -->
                <svg class="w-6 h-6 text-gray-700 hover:text-blue-600" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>

                <!-- Badge jumlah -->
                @if (auth()->user()->unreadNotifications->count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-red-600 rounded-full">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </span>
                @endif
            </button>

            <!-- Dropdown notifikasi -->
            <div id="notifDropdown" class="absolute right-0 z-10 mt-2 w-80 bg-white border rounded-md shadow-lg hidden">
                <div class="p-4 max-h-60 overflow-y-auto">
                    @forelse(auth()->user()->unreadNotifications as $notification)
                        <div class="mb-2 border-b pb-2">
                            <p class="text-gray-700 text-sm">
                                {{ $notification->data['message'] ?? 'Notifikasi baru' }}
                            </p>
                            <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Tidak ada notifikasi baru.</p>
                    @endforelse
                </div>
            </div>
        </li>
        </li>
    </ul>
</nav>

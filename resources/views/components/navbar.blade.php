<nav class="p-4 rounded-xl bg-sky-600 shadow-md">
    <ul class="flex justify-end gap-10 pr-32">

        <!-- Menu Navigasi Utama -->
        <li>
            <a href="{{ route('home.index') }}" class="text-white hover:text-yellow-300 font-semibold">Home</a>
        </li>
        <li>
            <a href="{{ route('artikel.index') }}" class="text-white hover:text-yellow-300 font-semibold">Artikel</a>
        </li>
        <li>
            <a href="{{ route('grafik.index') }}" class="text-white hover:text-yellow-300 font-semibold">Grafik</a>
        </li>
        <li>
            <a href="{{ route('pelaporan.index') }}" class="text-white hover:text-yellow-300 font-semibold">Pelaporan</a>
        </li>

        <!-- Notifikasi -->
        <li class="relative group">
            <a href="#" class="relative flex items-center text-white hover:text-yellow-300" id="alertsDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute -top-2 -right-2 text-xs bg-red-600 rounded-full px-1">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            </a>

            <!-- Dropdown Notifikasi -->
            <div class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg z-20 hidden group-hover:block">
                <h6 class="px-4 py-2 font-semibold text-gray-700 border-b">Alerts Center</h6>

                @forelse(auth()->user()->notifications as $notification)
                    <a href="{{ route('pelaporan.show', $notification->data['pelaporan_id']) }}"
                        class="flex items-start px-4 py-3 hover:bg-gray-100">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary w-8 h-8 flex items-center justify-center rounded-full">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div class="text-sm">
                            <div class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                            <div class="font-semibold">{{ $notification->data['message'] }}</div>
                        </div>
                    </a>
                @empty
                    <div class="px-4 py-3 text-center text-sm text-gray-500">No notifications</div>
                @endforelse

                <a href="#" class="block px-4 py-3 text-center text-sm text-gray-600 hover:bg-gray-100">Show All
                    Alerts</a>
            </div>
        </li>

        <!-- Dropdown Profil (Role: masyarakat) -->
        @auth
            @if (auth()->user()->role === 'masyarakat')
                <li class="relative group">
                    <a href="#" class="flex items-center text-white hover:text-yellow-300 font-semibold">
                        <span class="mr-2">{{ auth()->user()->name }}</span>
                        <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/undraw_profile.svg') }}"
                            alt="User profile">
                    </a>

                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            @endif
        @endauth

    </ul>
</nav>

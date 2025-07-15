<x-login-form-layout>
    <section 
        class="bg-gray-100 flex items-center justify-center min-h-screen bg-cover bg-center" 
        style="background-image: url('/images/dinas.jpg');"
    >
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md bg-opacity-90">
            <h2 class="text-2xl font-bold text-center mb-2">Login Aplikasi</h2>
            <p class="text-center text-gray-600 mb-6">Silakan login untuk melanjutkan</p>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @else
                <div class="bg-green-100 text-red-800 px-4 py-2 rounded mb-4">
                    {{ session('failed') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium">Email Address</label>
                    <input type="email" name="email" id="email" required
                        class="w-full mt-1 p-2 border rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full mt-1 p-2 border rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Submit Login
                </button>
            </form>
            <div class="w-full text-center mt-2">
                <a href="{{ route('registration.option') }}" class="text-sky-200 hover:underline hover:text-sky-800 text-xl">
                    register
                </a>
            </div>

        </div>
    </section>
</x-login-form-layout>

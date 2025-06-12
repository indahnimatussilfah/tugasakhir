<x-login-form-layout>
    <div class="max-w-xl mx-auto mt-12 px-6">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Registrasi Aplikasi Masyarakat</h2>
            <p class="text-gray-600 mt-1">Silahkan isi formulir berikut untuk registrasi aplikasi</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="POST" action="{{ route('register-masyarakat.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="mb-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" id="nik" name="nik" placeholder="Masukkan NIK"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address (Opsional)</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email (boleh dikosongkan)"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition font-semibold">
                    Submit Registrasi
                </button>
            </form>
        </div>
    </div>
</x-login-form-layout>

<x-login-form-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-red-100 bg-cover bg-center px-4"
         style="background-image: url('/images/Registerpetugas.png');">

        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Form Registrasi Puskesmas</h2>
            <p class="text-gray-600 mt-1">Silahkan isi formulir berikut untuk registrasi aplikasi</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
            <form method="POST" action="{{ route('register-petugas-kesehatan.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Layanan Kesehatan</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama layanan kesehatan"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <input type="hidden" name="role" value="petugas_kesehatan">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="no_telpon" class="block text-sm font-medium text-gray-700">No Telpon</label>
                    <input type="text" id="no_telpon" name="no_telpon" placeholder="Masukkan no telpon"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Ulangi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-gray-50 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition font-semibold">
                    Submit Registrasi
                </button>
            </form>
        </div>
    </div>
</x-login-form-layout>

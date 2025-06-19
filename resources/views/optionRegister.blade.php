<x-login-form-layout>
    <div class="min-h-screen flex items-center justify-center bg-red-100 bg-cover bg-center" 
     style="background-image: url('/images/Register.png');">
        <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-8 w-full max-w-6xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Pilih Jenis Registrasi</h2>
                <p class="text-gray-600">Silakan pilih jenis pengguna untuk melakukan registrasi</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kartu Masyarakat -->
                <div class="bg-gray-50 rounded-lg shadow-md p-6 flex flex-col justify-between text-center">
                    <div>
                        <h5 class="text-xl font-semibold mb-2">Registrasi Masyarakat</h5>
                        <p class="text-gray-600">Formulir ini untuk pengguna umum atau masyarakat.</p>
                    </div>
                    <a href="{{ route('register-masyarakat.index') }}" class="mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Daftar sebagai Masyarakat
                    </a>
                </div>

                <!-- Kartu Petugas -->
                <div class="bg-gray-50 rounded-lg shadow-md p-6 flex flex-col justify-between text-center">
                    <div>
                        <h5 class="text-xl font-semibold mb-2">Registrasi Petugas Kesehatan</h5>
                        <p class="text-gray-600">Formulir ini untuk petugas dari fasilitas kesehatan.</p>
                    </div>
                    <a href="{{ route('register-petugas-kesehatan.index') }}" class="mt-6 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Daftar sebagai Petugas
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-login-form-layout>

@extends('petugaskesehatan.layouts.app')

@section('content')
<div class="flex justify-center mt-16">
    <div class="w-full max-w-xl bg-white p-10 rounded-xl shadow-md">
        <h2 class="text-3xl font-semibold text-center text-gray-700 mb-8">Edit Profil</h2>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', auth()->user()->name) }}" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none @error('name') border-red-500 @enderror" 
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Baru --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password Baru <span class="text-gray-400">(Opsional)</span>
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                >
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-center">
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow disabled:opacity-50 transition"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

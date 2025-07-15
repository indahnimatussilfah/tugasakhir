<x-layouts>
<section class="py-10 px-4">
  <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <img src="{{ asset('storage/' . $artikel->foto) }}" class="w-full h-64 object-cover rounded mb-4" alt="{{ $artikel->judul }}">
    <h1 class="text-3xl font-bold mb-4">{{ $artikel->judul }}</h1>
    <div class="text-gray-700 text-base leading-relaxed">
      {!! $artikel->isi !!}
    </div>
  </div>
</section>
</x-layouts>

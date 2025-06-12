<x-layouts>
<section class="bg-sky-200 py-10 px-4 mt-[46px]">
  <div class="relative">
    <!-- Tombol panah kiri -->
    <button id="scrollLeft" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white p-2 rounded-full shadow">
      <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
      </svg>
    </button>

    <!-- Kontainer kartu -->
    <div id="cardContainer" class="flex gap-6 overflow-x-auto px-10 scroll-smooth">
      <!-- Kartu 1 -->
      @foreach ($dataArtikel as $artikel)
          
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{  $artikel->judul }}" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">{{ $artikel->judul }}</h2>
        <p class="text-sm">{{ $artikel->isi }}</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>
      @endforeach

      {{-- <!-- Kartu 2 -->
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/diare.jpg') }}" alt="Diare" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>Diare:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>

      <!-- Kartu 3 -->
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/hiv.jpg') }}" alt="HIV" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>HIV:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/hiv.jpg') }}" alt="HIV" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>HIV:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/hiv.jpg') }}" alt="HIV" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>HIV:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/hiv.jpg') }}" alt="HIV" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>HIV:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/hiv.jpg') }}" alt="HIV" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>HIV:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div>
      <div class="bg-white rounded-xl shadow-md w-72 p-4 flex-shrink-0">
        <img src="{{ asset('images/hiv.jpg') }}" alt="HIV" class="rounded-md mb-4 w-full h-40 object-cover">
        <h2 class="font-semibold text-lg">Pencegahan Penyakit</h2>
        <p class="text-sm"><strong>HIV:</strong> Langkah-Langkah Sederhana untuk Hidup Sehat</p>
        <a href="#" class="text-blue-500 text-sm mt-2 inline-block">selengkapnya...</a>
      </div> --}}
    {{-- </div> --}}

    <!-- Tombol panah kanan -->
    <button id="scrollRight" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white p-2 rounded-full shadow">
      <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</section>
</x-layouts>
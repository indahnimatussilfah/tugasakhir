import { map, marker } from './leaflet';

export async function liveSearch () {
   document.getElementById('searchInput').addEventListener('input', async function () {
        const query = this.value;
        const resultsContainer = document.getElementById('searchResults');

        if (query.length < 2) {
            resultsContainer.innerHTML = '';
            resultsContainer.classList.add('hidden');
            return;
        }

        try {
            const response = await fetch(`/search?q=${encodeURIComponent(query)}`);
            const data = await response.json();

            if (data.length === 0) {
                resultsContainer.innerHTML = '<div class="p-2 text-gray-500">Tidak ditemukan.</div>';
            } else {
                resultsContainer.innerHTML = data.map(item =>
                    `<div class="p-2 hover:bg-gray-100 cursor-pointer text-sm" data-lat="${item.latitude}" data-lng="${item.longitude}" data-nama="${item.nama_layanan}">${item.nama_layanan}</div>`
                ).join('');
                itemsSearchResult();
            }

            resultsContainer.classList.remove('hidden');

        } catch (err) {
            console.error('Error:', err);
            resultsContainer.innerHTML = '<div class="p-2 text-red-500">Gagal memuat data</div>';
            resultsContainer.classList.remove('hidden');
        }
    });
}


export function itemsSearchResult () {
document.querySelectorAll('#searchResults > div').forEach(item => {
        item.addEventListener('click', () => {
            const lat = item.getAttribute('data-lat');
            const lng = item.getAttribute('data-lng');
            const nama = item.getAttribute('data-nama');

            // ✅ Redirect ke halaman /gis dengan query string
            const url = `/gis?lat=${lat}&lng=${lng}&nama=${encodeURIComponent(nama)}`;
            window.location.href = url;
        });
    });

}
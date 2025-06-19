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
                resultsContainer.innerHTML = data.map(item => {
                    const encodedItem = btoa(unescape(encodeURIComponent(JSON.stringify(item))));
                    return `<div class="p-2 hover:bg-gray-100 cursor-pointer text-sm" data-item="${encodedItem}">
                        ${item.nama_layanan}
                    </div>`;

                }
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
            try {     
                const encoded = item.getAttribute('data-item');
                const dataItem = JSON.parse(decodeURIComponent(escape(atob(encoded))));
                const params = new URLSearchParams();
                for (const key in dataItem) {
                    if (key === 'foto') {
                         const cleaned = dataItem.foto.replace(/^[^/]+\/\/[^/]+/, '');
                         params.append('foto', cleaned);
                    } else {
                        params.append(key, dataItem[key]);
                    }
                    }
                // ✅ Redirect ke halaman /gis dengan query string
                const url = `/gis?${params.toString()}`;
                window.location.href = url;
            } catch (e) {
                console.error('Parsing error : ' . e)
            }
        });
    });

}
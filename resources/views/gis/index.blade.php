<x-layouts>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Peta Layanan Kesehatan Terdekat</h1>

        <div id="map" class="w-full h-[600px] rounded shadow"></div>

        <button onclick="getUserLocation()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Temukan Layanan Terdekat
        </button>
    </div>

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const dalakes = @json($dalakes);

        const map = L.map('map').setView([-6.9, 107.6], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const markers = [];

        dalakes.forEach(service => {
            const marker = L.marker([service.latitude, service.longitude])
                .addTo(map)
                .bindPopup(`
                    <strong>${service.nama_layanan}</strong><br>
                    ${service.alamat}<br>
                    ${service.foto ? `<img src="/storage/${service.foto}" alt="Foto ${service.nama_layanan}" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px; margin-top: 8px;">` : ''}
                `);
            
            markers.push({
                marker,
                lat: service.latitude,
                lng: service.longitude,
                nama: service.nama_layanan,
                alamat: service.alamat,
                foto: service.foto
            });
        });

        let userMarker;

        function getUserLocation() {
            if (!navigator.geolocation) {
                return alert("Browser tidak mendukung fitur geolokasi.");
            }

            navigator.geolocation.getCurrentPosition(position => {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                if (userMarker) map.removeLayer(userMarker);

                userMarker = L.marker([userLat, userLng], {
                    icon: L.icon({
                        iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64113.png',
                        iconSize: [30, 40],
                        iconAnchor: [15, 40]
                    })
                }).addTo(map).bindPopup("Lokasi Anda").openPopup();

                map.setView([userLat, userLng], 13);

                let nearest = null;
                let minDist = Infinity;

                markers.forEach(item => {
                    const dist = getDistance(userLat, userLng, item.lat, item.lng);
                    if (dist < minDist) {
                        minDist = dist;
                        nearest = item;
                    }
                });

                if (nearest) {
                    L.popup()
                        .setLatLng([nearest.lat, nearest.lng])
                        .setContent(`
                            <b>Layanan Terdekat:</b><br>
                            ${nearest.nama}<br>
                            <small>${nearest.alamat}</small><br>
                            <em>Jarak: ${minDist.toFixed(2)} km</em><br>
                            ${nearest.foto ? `<img src="/storage/${nearest.foto}" alt="Foto ${nearest.nama}" style="width: 160px; height: 100px; object-fit: cover; border-radius: 8px; margin-top: 8px;">` : ''}
                        `)
                        .openOn(map);
                }

            }, () => {
                alert("Gagal mengambil lokasi Anda.");
            });
        }

        function getDistance(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = deg2rad(lat2 - lat1);
            const dLon = deg2rad(lon2 - lon1);
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            return R * (2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)));
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180);
        }
    </script>
</x-layouts>

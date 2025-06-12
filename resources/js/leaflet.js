import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

export let map = null;
export let marker = null;

export function viewMapGis () {
    const urlParams = new URLSearchParams(window.location.search);
    const lat = parseFloat(urlParams.get('lat'));
    const lng = parseFloat(urlParams.get('lng'));
    const nama = urlParams.get('nama');

    const defaultLat = -6.326;
    const defaultLng = 108.322;

    map = L.map('map').setView(
        (lat && lng) ? [lat, lng] : [defaultLat, defaultLng],
        (lat && lng) ? 15 : 12
    );

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    if (lat && lng && nama) {
        marker = L.marker([lat, lng])
            .addTo(map)
            .bindPopup(`<strong>${nama}</strong>`)
            .openPopup();
    }
}
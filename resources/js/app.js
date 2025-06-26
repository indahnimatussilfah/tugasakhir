import './bootstrap';
import Chart from 'chart.js/auto';
import 'flowbite';
import { liveSearch } from './search';
import { viewMapGis } from './leaflet';



document.addEventListener('DOMContentLoaded', () => {
  if (document.getElementById('map')) {
    viewMapGis();
  }
  liveSearch();
});




function renderChart(canvasId, labels, dataValues, colors) {
  const ctx = document.getElementById(canvasId).getContext('2d');

  const data = {
    labels: labels,
    datasets: [{
      label: 'Jumlah Kasus',
      data: dataValues,
      backgroundColor: colors,
      borderRadius: 6,
      barThickness: 25,
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      indexAxis: 'y', // horizontal bar
      scales: {
        x: {
          grid: { display: false },
          ticks: {
            callback: function(value) {
              return value.toLocaleString();
            }
          }
        },
        y: {
          grid: { display: false }
        }
      },
      plugins: {
        legend: { display: false }
      }
    }
  };

  new Chart(ctx, config);
}

const penyakitChart = document.getElementById('penyakitChart');

if (penyakitChart) {
  const labels = dataPenyakit.map(item => `${item.nama_penyakit} - ${item.nama_puskesmas}`)
  
  const dataValues = dataPenyakit.map(item => `${item.jumlah}`);
  
  const colors = ['#ef4444'];
  
  // ✅ Render chart
  renderChart('penyakitChart', labels, dataValues, colors);
}



const options = {
  chart: {
    height: "100%",
    maxWidth: "100%",
    type: "area",
    fontFamily: "Inter, sans-serif",
    dropShadow: {
      enabled: false,
    },
    toolbar: {
      show: false,
    },
  },
  tooltip: {
    enabled: true,
    x: {
      show: false,
    },
  },
  fill: {
    type: "gradient",
    gradient: {
      opacityFrom: 0.55,
      opacityTo: 0,
      shade: "#1C64F2",
      gradientToColors: ["#1C64F2"],
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 6,
  },
  grid: {
    show: false,
    strokeDashArray: 4,
    padding: {
      left: 2,
      right: 2,
      top: 0
    },
  },
  series: [
    {
      name: "New users",
      data: [6500, 6418, 6456, 6526, 6356, 6456],
      color: "#1A56DB",
    },
  ],
  xaxis: {
    categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
}

if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("area-chart"), options);
  chart.render();
}
// Tambah event listener pencarian geolocation
document.addEventListener('DOMContentLoaded', () => {
  // Event pencarian berdasarkan lokasi
  const searchButton = document.getElementById('searchButton');
  if (searchButton) {
    searchButton.addEventListener('click', function () {
      if (!navigator.geolocation) {
        alert('Geolocation tidak didukung oleh browser Anda.');
        return;
      }

      navigator.geolocation.getCurrentPosition(success, error);

      function success(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        const keyword = document.getElementById('searchInput').value || 'klinik';

        const apiKey = 'YOUR_GOOGLE_API_KEY';
        const radius = 5000;
        const type = 'hospital';

        const url = `https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${latitude},${longitude}&radius=${radius}&keyword=${keyword}&type=${type}&key=${apiKey}`;

        console.log('API URL:', url);
        alert('Pencarian lokasi akan dilakukan dengan koordinat Anda.\n\n(Lihat console untuk detail API.)');
      }

      function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
        alert('Gagal mendapatkan lokasi Anda.');
      }
    });
  }

  // 🔍 Live Search Layanan Kesehatan
  const input = document.getElementById('fasilitas');
  const suggestions = document.getElementById('suggestions');

  if (input && suggestions) {
    input.addEventListener('input', async function () {
      const query = this.value.trim();

      if (query.length < 2) {
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden');
        return;
      }

      try {
        const response = await fetch(`/api/dalakes?search=${encodeURIComponent(query)}`);
        const data = await response.json();

        suggestions.innerHTML = '';
        if (data.length > 0) {
          data.forEach(item => {
            const li = document.createElement('li');
            li.textContent = item.nama_layanan;
            li.className = 'px-4 py-2 hover:bg-blue-100 cursor-pointer';
            li.addEventListener('click', () => {
              input.value = item.nama_layanan;
              suggestions.innerHTML = '';
              suggestions.classList.add('hidden');
            });
            suggestions.appendChild(li);
          });
          suggestions.classList.remove('hidden');
        } else {
          suggestions.classList.add('hidden');
        }
      } catch (error) {
        console.error('Error fetching suggestions:', error);
      }
    });

    // Optional: sembunyikan saat klik di luar
    document.addEventListener('click', (e) => {
      if (!input.contains(e.target) && !suggestions.contains(e.target)) {
        suggestions.classList.add('hidden');
      }
    });
  }
});

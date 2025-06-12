
export function inputsDataPenyakit () {
    document.getElementById('inputDataPenyakit').addEventListener('input', function () {
        const query = this.value;
        searchDataPenyakit(query);
    });
}

async function searchDataPenyakit(query) {
    const tableDataPenyakit = document.getElementById('tableDataPenyakit');
    try {
        const response = await fetch(`/searchDataPenyakit?q=${encodeURIComponent(query)}`);
        const dataPenyakit = await response.json();

        // Kosongkan isi tbody
        tableDataPenyakit.innerHTML = '';

        if (dataPenyakit.length === 0) {
            tableDataPenyakit.innerHTML = '<tr><td colspan="15" class="text-center">Tidak ada hasil ditemukan.</td></tr>';
            return;
        }

        // Loop data dan render ulang ke tabel
        dataPenyakit.forEach((item, index) => {
            const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.tanggal}</td>
                    <td>${item.nama_penyakit}</td>
                    <td>${item.jumlah}</td>
                    <td>${item.laki_laki}</td>
                    <td>${item.perempuan}</td>
                    <td>${item.bayi}</td>
                    <td>${item.balita}</td>
                    <td>${item.anak}</td>
                    <td>${item.remaja}</td>
                    <td>${item.dewasa}</td>
                    <td>${item.lansia}</td>
                    <td>${item.nama_puskesmas}</td>
                    <td>${item.kecamatan}</td>
                    <td>
                        <a href="/datapenyakit/${item.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/datapenyakit/${item.id}" method="POST" style="display:inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus laporan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            `;
            tableDataPenyakit.innerHTML += row;
        });

    } catch (e) {
        console.error('Terjadi kesalahan:', e);
    }
}

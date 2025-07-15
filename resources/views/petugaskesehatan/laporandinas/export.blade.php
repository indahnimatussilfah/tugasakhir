<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penyakit</th>
            <th>Total Kasus</th>
            <th>Laki-laki</th>
            <th>Perempuan</th>
            <th>Bayi</th>
            <th>Balita</th>
            <th>Anak</th>
            <th>Remaja</th>
            <th>Dewasa</th>
            <th>Lansia</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rekap as $key => $data)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $data->nama_penyakit }}</td>
            <td>{{ $data->total_kasus }}</td>
            <td>{{ $data->laki_laki }}</td>
            <td>{{ $data->perempuan }}</td>
            <td>{{ $data->bayi }}</td>
            <td>{{ $data->balita }}</td>
            <td>{{ $data->anak }}</td>
            <td>{{ $data->remaja }}</td>
            <td>{{ $data->dewasa }}</td>
            <td>{{ $data->lansia }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

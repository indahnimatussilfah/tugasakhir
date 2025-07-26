@extends('admin.layouts.app')

@section('title', 'Tambah Puskesmas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Puskesmas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('puskesmas.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama">Nama Puskesmas</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="district">Kecamatan</label>
                    <select name="district_code" id="district" class="form-control" required>
                        <option value="">Pilih Kecamatan</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->code }}" {{ old('district_code') == $district->code ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="village">Desa</label>
                    <select name="village_code" id="village" class="form-control" required>
                        <option value="">Pilih Desa</option>
                        @foreach($villages as $village)
                            <option value="{{ $village->code }}"
                                    data-district="{{ $village->district_code }}"
                                    {{ old('village_code') == $village->code ? 'selected' : '' }}>
                                {{ $village->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('puskesmas.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const districtSelect = document.getElementById('district');
        const villageSelect = document.getElementById('village');

        function filterVillages() {
            const selectedDistrict = districtSelect.value;

            Array.from(villageSelect.options).forEach(option => {
                const districtAttr = option.getAttribute('data-district');
                if (!districtAttr) return; // Lewati opsi default
                option.style.display = districtAttr === selectedDistrict ? 'block' : 'none';
            });

            // Reset pilihan jika tidak sesuai
            const selectedOption = villageSelect.options[villageSelect.selectedIndex];
            if (selectedOption && selectedOption.getAttribute('data-district') !== selectedDistrict) {
                villageSelect.value = '';
            }
        }

        districtSelect.addEventListener('change', filterVillages);
        filterVillages(); // Jalankan saat pertama kali load (untuk old value)
    });
</script>
@endsection

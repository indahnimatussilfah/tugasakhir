@extends('admin.layouts.app')

@section('title', 'Detail Puskesmas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Detail Puskesmas</h1>

    <div class="card">
        <div class="card-body">

            <div class="mb-3">
                <strong>Nama:</strong>
                <p>{{ $puskesmas->nama }}</p>
            </div>

            <div class="mb-3">
                <strong>Kecamatan:</strong>
                <p>{{ $puskesmas->district->name ?? '-' }}</p>
            </div>

            <div class="mb-3">
                <strong>Desa:</strong>
                <p>{{ $puskesmas->village->name ?? '-' }}</p>
            </div>

            <div class="mb-3">
                <strong>Alamat:</strong>
                <p>{{ $puskesmas->alamat ?? '-' }}</p>
            </div>

            <a href="{{ route('puskesmas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

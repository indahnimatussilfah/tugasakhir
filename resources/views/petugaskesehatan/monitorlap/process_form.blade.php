@extends('petugaskesehatan.layouts.app')

@section('title', 'Proses Pelaporan')

@section('content')
<div class="container">
    <h1>Proses Pelaporan: {{ $pelaporan->nama }}</h1>

    <form action="{{ route('reports.process', $pelaporan->id) }}" method="POST">
        @csrf
        <p>Apakah Anda yakin ingin memproses laporan ini?</p>
        <button type="submit" class="btn btn-success">Proses</button>
        <a href="{{ route('monitorlap.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

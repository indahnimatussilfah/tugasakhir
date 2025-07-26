@extends('admin.layouts.app')

@section('title', 'Data Puskesmas')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Puskesmas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('puskesmas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Puskesmas
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="width: 50px;">No</th>
                        <th scope="col">Nama Puskesmas</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Alamat</th>
                        <th scope="col" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($puskesmas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->district->name ?? '-' }}</td>
                            <td>{{ $item->village->name ?? '-' }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('puskesmas.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('puskesmas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('puskesmas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data puskesmas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

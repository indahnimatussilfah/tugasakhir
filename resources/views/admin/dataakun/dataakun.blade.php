@extends('admin.layouts.app')

@section('title', 'Manajemen Akun')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Akun</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
                <div>
                    <a href="{{ route('dataakun.export') }}" class="btn btn-success btn-sm mr-2">
                        <i class="fas fa-file-export"></i> Ekspor
                    </a>
                    {{-- <a href="{{ route('dataakun.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Akun
                    </a> --}}
                </div>
            </div>

            <div class="card-body">
                {{-- Tampilkan pesan sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="akunTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $akun)
                                <tr>
                                    <td>{{ $akun->id }}</td>
                                    <td>{{ $akun->name }}</td>
                                    <td>{{ $akun->email ?? '-' }}</td>
                                    <td>{{ $akun->role ?? '-' }}</td>
                                    <td>{{ $akun->created_at ? $akun->created_at->format('Y-m-d') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('dataakun.edit', $akun->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dataakun.destroy', $akun->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada data akun.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#akunTable').DataTable();
        });
    </script>
@endsection

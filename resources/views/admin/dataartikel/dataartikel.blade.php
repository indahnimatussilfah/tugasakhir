@extends('admin.layouts.app')

@section('title', 'Manajemen Artikel')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Artikel</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
                <div>
                    <a href="#" class="btn btn-success btn-sm mr-2">
                        <i class="fas fa-file-export"></i> Ekspor
                    </a>
                    <a href="{{ route('dataartikel.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Artikel
                    </a>
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
                    <table class="table table-bordered" id="artikelTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataArtikel as $artikel)
                                <tr>
                                    <td>{{ $artikel->id }}</td>
                                    <td>{{ $artikel->judul }}</td>
                                    <td>{{ $artikel->isi }}</td>
                                    <td>{{ $artikel->penulis }}</td>
                                    <td>{{ $artikel->tanggal }}</td>
                                    <td>
                                        @if ($artikel->foto)
                                            <img src="{{ asset('storage/' . $artikel->foto) }}"
                                                alt="Foto {{ $artikel->judul }}" width="100">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dataartikel.update', $artikel->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('dataartikel.destroy', $artikel->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Tidak ada data layanan kesehatan.</td>
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
            $('#penyakitTable').DataTable();
        });
    </script>
@endsection

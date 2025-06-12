@extends('admin.layouts.app')

@section('title', 'Edit Data Akun')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Akun</h1>

    <div class="card shadow">
        <div class="card-body">
            {{-- Tampilkan pesan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dataakun.update', $akun->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $akun->nama) }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $akun->email) }}" required>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input type="text" name="role" class="form-control" value="{{ old('role', $akun->role) }}" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Dibuat</label>
                    <input type="date" name="tanggal_dibuat" class="form-control" value="{{ old('tanggal_dibuat', $akun->tanggal_dibuat ? \Carbon\Carbon::parse($akun->tanggal_dibuat)->format('Y-m-d') : '') }}">
                </div>

                <div class="form-group">
                    <a href="{{ route('dataakun.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

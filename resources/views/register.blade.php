




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <main>
        {{ $slot }}
    </main>
  
    {{-- <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Registrasi Aplikasi</h2>
            <p class="text-muted">Silahkan isi formulir berikut untuk registrasi aplikasi</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('registration.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit Registrasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</body>
</html>

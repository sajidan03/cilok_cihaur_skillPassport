<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <style>
        body {
            background: #f1f5f9;
        }

        .register-card {
            max-width: 500px;
            margin: 5% auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .navbar {
            background-color: #6610f2;
        }

        .navbar-brand, .title-text {
            color: #fff !important;
        }
    </style>
</head>
<body>

    {{-- Navbar minimalis --}}
    <nav class="navbar navbar-expand-sm">
        <div class="container justify-content-between">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/icon.png') }}" alt="Logo" height="35" class="me-2">
                <span class="title-text">Daftar Akun</span>
            </a>
        </div>
    </nav>
    <div class="register-card">
        <h3 class="mb-4 text-center">Buat Akun Baru</h3>
        <form action="{{ route('daftar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Daftar</button>

            <p class="text-center mt-3">
                Sudah punya akun? <a href="{{ route('member.login') }}">Login di sini</a>
            </p>
        </form>
    </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

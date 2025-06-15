@extends('template')

@section('title', 'Login')

@section('content')
<style>
    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to right, #4b6cb7, #182848);
    }

    .login-card {
        background: #ffffff;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 420px;
    }

    .form-control:focus {
        border-color: #4b6cb7;
        box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
    }

    .login-logo {
        width: 70px;
        height: 70px;
        object-fit: cover;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Masuk ke Akun Anda</h3>
            <p class="text-muted">Selamat datang kembali! Silakan login untuk melanjutkan.</p>
        </div>

        @if(session('messages'))
        <div class="alert alert-danger">
            {{ session('messages') }}
        </div>
        @endif
        @if(session('messages-success'))
        <div class="alert alert-success">
            {{ session('messages-success') }}
        </div>
        @endif

        <form action="/auth" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nama@gmail.com" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="text-center">
                <small class="text-muted">Belum punya akun? <a href="/daftar">Daftar sekarang</a></small>
            </div>
        </form>
    </div>
</div>
@endsection

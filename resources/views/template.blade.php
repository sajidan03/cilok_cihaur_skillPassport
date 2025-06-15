<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: var(--color-main);">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/icon.png') }}" alt="Cilok Cihaur" height="40"></a>
            <a class="navbar-brand" href="javascript:void(0)">Cilok Cihaur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Keranjang</a>
                    </li>
                </ul>
                <form class="d-flex me-1">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
                @if (Auth::check())
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-circle-user text-white" style="font-size: 30px"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="/invoices">invoices</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="d-flex align-items-center ps-2">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="/login" class="btn btn-secondary">Login</a>
                @endif
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-6">
                <h5 class="mb-3">Hubungi Kami</h5>
               <ul class="list-unstyled">
                    <li>
                        <i class="fab fa-instagram me-2 text-danger"></i>
                        <a href="https://instagram.com/cilokcihaur" class="text-white text-decoration-none" target="_blank">
                            Instagram @cilokcihaur
                        </a>
                    </li>
                    <li>
                        <i class="fab fa-whatsapp me-2 text-success"></i>
                        <a href="https://wa.me/6285839181124" class="text-white text-decoration-none" target="_blank">
                            WhatsApp: (+62) 858 3918 1124
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-envelope me-2 text-warning"></i>
                        <a href="mailto:cilokcihaur@cc.co.id" class="text-white text-decoration-none">
                            Email: cilokcihaur@cc.co.id
                        </a>
                    </li>
                    <li>
                        <i class="fab fa-facebook me-2 text-primary"></i>
                        <a href="https://facebook.com/cilokcihaur" class="text-white text-decoration-none" target="_blank">
                            Facebook @cilokcihaur
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 text-md-end d-flex align-items-end justify-content-md-end">
                <p class="mb-0">&copy; {{ date('Y') }} <strong>Cilok Cihaur</strong> — Semua Hak Dilindungi.</p>
            </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

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
            @if (!Route::is('admin.login'))
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/member">Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/category">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/product">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/administrator/invoices">Invoice</a>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <label for="" class="text-white">
                            {{ Auth::user()->name }}
                        </label>
                        <a href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-circle-user text-white" style="font-size: 30px"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
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

                </div>
            @endif
        </div>
    </nav>
    @yield('content')
</body>

</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

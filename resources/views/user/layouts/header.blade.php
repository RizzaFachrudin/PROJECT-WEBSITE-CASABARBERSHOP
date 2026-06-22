<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="shorcut icon" type="image/png" href="{{ asset('main/img/logo.png') }}" />

    {{-- JS --}}
    <script src="{{ asset('main/sciript.js') }}" defer></script>

    <title>Barber Web</title>
</head>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.dashboard') }}">
            <img src="{{ asset('main/img/logox.png') }}" alt="Logo" width="38" height="35">
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}"
                       class="nav-link btn btn-outline-theme ps-3 pe-3">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#contact"
                       class="nav-link btn btn-outline-theme ps-3 pe-3">
                        Kontak
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#invoices"
                       class="nav-link btn btn-outline-theme ps-3 pe-3">
                        Invoices History
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#profile"
                       class="nav-link btn btn-outline-theme ps-3 pe-3">
                        Profile
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('user.logout') }}" method="POST"
                          onsubmit="return confirm('Kamu yakin untuk logout?')">
                        @csrf
                        <button type="submit"
                                class="nav-link btn btn-color-theme ps-3 pe-3">
                            Logout
                        </button>
                    </form>
                </li>

            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->

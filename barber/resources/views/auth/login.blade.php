<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- STYLE --}}
    <link rel="stylesheet" href="{{ asset('main/style.css') }}" />

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- FAVICON --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('main/img/logox.png') }}" />

    {{-- SCRIPT --}}
    <script src="{{ asset('main/sciript.js') }}" defer></script>

    <title>Admin Area</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5 text-center">
                <img src="{{ asset('main/img/logox.png') }}" width="15%" alt="Logo Barber" />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-7 mt-3">
                <img class="img-fluid" src="{{ asset('main/img/login.svg') }}" width="550px" alt="Login Image" />
            </div>

            <div class="col-md-5 mt-3">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <h4>
                            <center>Admin Area</center>
                        </h4>

                        <form class="mt-4" method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf

                            @if (session('info'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    id="username" autocomplete="off" required />
                            </div>

                            <div class="input-group mt-2">
                                <input type="password" class="form-control" placeholder="Password" id="password"
                                    name="password" autocomplete="off" required />
                            </div>

                            <div class="d-grid gap-2 mt-2">
                                <button class="btn mt-2 btn-color-theme" type="submit" id="login">
                                    Login
                                </button>

                                <p class="text-center">
                                    <a class="text-theme text-center" href="{{ url('/') }}">Back to Home</a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        feather.replace();
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
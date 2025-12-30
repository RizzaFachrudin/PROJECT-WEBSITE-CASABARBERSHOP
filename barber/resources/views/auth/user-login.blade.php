<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('user/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="shortcut icon" type="image/png" href="{{ asset('user/img/logox.png') }}" />

    <title>Sign In</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5 text-center">
                <img src="{{ asset('main/img/logox.png') }}" width="12%" alt="Logo Barber" />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-7 mt-3">
                <img class="img-fluid" src="{{ asset('user/img/signin.svg') }}" width="450px" alt="Login Image" />
            </div>

            <div class="col-md-5 mt-md-5">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Sign In</h4>

                        {{-- Alert error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        {{-- Alert success --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('user.login.submit') }}" method="POST" class="mt-4">
                            @csrf

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="input-group mt-2">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>

                            <a class="text-theme" href="#">Forgot Password?</a>

                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-color-theme" type="submit">
                                    Login
                                </button>

                                <p class="text-center">
                                    Belum punya akun?
                                    <a class="text-theme" href="{{ route('user.register') }}">Sign Up</a>
                                </p>

                                <a class="text-theme text-center" href="{{ url('/') }}">Back to Home</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>feather.replace();</script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>

</body>

</html>
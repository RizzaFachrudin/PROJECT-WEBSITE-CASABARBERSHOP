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

    <title>Sign up</title>

<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-2 text-center">
                <img src="{{ asset('user/img/logox.png') }}" width="8%" alt="Logo Barber" />
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset('user/img/signup.svg') }}" width="450px" alt="Register Image">
            </div>

            <div class="col-md-6 mt-3">
                <div class="card shadow-sm p-3">
                    <div class="card-body">
                        <h4 class="text-center">Sign Up</h4>

                        {{-- ERROR MESSAGES --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.register.submit') }}" method="POST" class="mt-4">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" name="username" required placeholder="Username">
                            </div>

                            <div class="form-group mt-2">
                                <input type="text" class="form-control" name="number" required maxlength="14"
                                    placeholder="Mobile Number">
                            </div>

                            <div class="form-group mt-2">
                                <input type="email" class="form-control" name="email" required placeholder="Email">
                            </div>

                            <div class="form-group mt-2">
                                <input type="password" class="form-control" name="password" required
                                    placeholder="Password">
                            </div>

                            <div class="form-group mt-2">
                                <input type="password" class="form-control" name="password_confirmation" required
                                    placeholder="Confirm Password">
                            </div>

                            <button class="btn btn-primary w-100 mt-3 btn-color-theme" type="submit">
                                Sign Up
                            </button>

                            <p class="text-center mt-2">
                                Sudah punya akun?
                                <a class="text-theme" href="{{ route('user.login') }}">Sign In</a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
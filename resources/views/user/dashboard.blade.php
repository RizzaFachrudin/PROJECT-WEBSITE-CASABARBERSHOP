<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="shorcut icon" type="image/png" href="{{ asset('main/img/logox.png') }}" />
    <script src="{{ asset('assets/sciript.js') }}" defer></script>

    <title>Casa Barber</title>
  </head>

  <body>
    <!-- navbar -->
    @include('user.layouts.header')
    <!-- navbar end -->

    <!-- Scroll -->
    <button class="go-top-btn">
      <img src="{{ asset('main/img/arrow-up.png') }}" alt="arrow up">
    </button>
    <!-- End Scroll -->

    <!-- Banner Start -->
    <section class="hero container">
      <div class="mt-5">
        <div class="row ms-3">
          <div class="col-md-6">
            <h1 class="fw-bold">
              Casa Barber <br />
            </h1>
            <p class="text-muted mt-3">
              Anda dapat melihat history pembayaran
              <div id="typing">Anda senang kami tenang</div>
              <div id="line">|</div>
            </p>
          </div>
          <div class="col-md-6 mt-2">
            <img class="img-banner img-fluid"
              src="{{ asset('main/img/banner.svg') }}"
              alt="barber logo"
              width="500px"/>
          </div>
        </div>
      </div>
    </section>
    <!-- Banner End -->

    <!-- Contact Start -->
    <span id="contact"></span>
    <section class="about mt-5 pd-5" id="contact">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-6">
            <img src="{{ asset('main/img/aboutBarber.svg') }}" width="500px"
              class="img-fluid" alt="contact Image"/>
          </div>

          <div class="col-md-6">
            <h2 class="fw-bold">Kontak</h2>
            <hr>

            <div class="map-content-9 mt-lg-0 mt-4">
              <form action="{{ route('user.contact') }}" method="POST">
                @csrf

                @if (session('info'))
                  <div class="alert alert-success text-center">
                    {{ session('info') }}
                  </div>
                @endif

                <div class="row">
                  <div class="twice-two col-6">
                    <input type="text" class="form-control" style="height: 50px;"
                      name="name" placeholder="Nama Lengkap" required autocomplete="off"><br>
                  </div>

                  <div class="twice-two col-6">
                    <input type="email" class="form-control" style="height: 50px;"
                      placeholder="Email" required name="email"><br>
                  </div>
                </div>

                <textarea class="form-control message" style="height: 138px;"
                  name="pesan" maxlength="500" placeholder="Pesan" required></textarea>

                <button type="submit"
                  class="btn btn-outline-theme pe-4 ps-4 pt-2 mt-3">
                  Kirim Pesan
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact End -->

    <!-- invoices -->
    <span id="invoices"></span>
    <div id="page-wrapper">
      <div class="main-page">
        <div class="tables">
          <div class="table-responsive bs-example widget-shadow">
            <h4 style="padding-bottom: 20px;text-align: center;color: blue;">
              Invoice History
            </h4>

            <table class="table table-bordered mt-3">
              <thead>
                <tr align="center">
                  <th>#</th>
                  <th>Invoice Id</th>
                  <th>Customer Name</th>
                  <th>Customer Number</th>
                  <th>Invoice Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($invoices as $index => $row)
                <tr align="center">
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $row->BillingId }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->number }}</td>
                  <td>{{ $row->invoicedate }}</td>
                  <td>
                    <a href="{{ route('user.invoice', $row->BillingId) }}"
                       class="btn btn-primary">
                      View
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- end invoices -->

    <!-- profile Start -->
    <span id="profile"></span>
    <section class="about mt-5 pd-5" id="profile">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-6">
            <img src="{{ asset('main/img/profile.svg') }}"
              width="400px" class="img-fluid" alt="profile Image"/>
          </div>

          <div class="col-md-6">
            <h2 class="fw-bold">Users Profile</h2>
            <hr>

            <div class="map-content-9 mt-lg-0 mt-4">
              <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf

                <div class="twice-two">
                  <input type="text" class="form-control" style="height: 50px;"
                    name="name" value="{{ $user->nama }}"><br>
                </div>

                <div class="twice-two">
                  <input type="text" class="form-control" style="height: 50px;"
                    value="{{ $user->number }}" readonly><br>
                </div>

                <div class="twice-two">
                  <input type="email" class="form-control" style="height: 50px;"
                    value="{{ $user->email }}" readonly><br>
                </div>

                <div class="twice-two">
                  <input type="text" class="form-control" style="height: 50px;"
                    value="{{ $user->created_at }}" readonly><br>
                </div>

                <button type="submit"
                  class="btn btn-outline-theme pe-4 ps-4 pt-2">
                  Update Profile
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- profile End -->

    <!-- Footer -->
    @include('user.layouts.footer')
    <!-- Footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>

    <script src="https://unpkg.com/feather-icons"></script>
    <script>feather.replace();</script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>
  </body>
</html>

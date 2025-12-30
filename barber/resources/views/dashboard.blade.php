@php
    // variabel dari controller:
    // $services  => daftar layanan (tblservices)
    // $locations => daftar lokasi (tblpage where PageType = 'location')
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('main/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="shorcut icon" type="image/png" href="{{ asset('main/img/logox.png') }}" />

    <script src="{{ asset('main/sciript.js') }}" defer></script>

    <title>Casa Barber</title>
</head>

<body>

    {{-- ===== Navbar ===== --}}
    @include('layouts.header')
    {{-- ===== End Navbar ===== --}}

    {{-- Scroll to top --}}
    <button class="go-top-btn">
        <img src="{{ asset('main/img/arrow-up.png') }}" alt="arrow up">
    </button>

    {{-- Banner --}}
    <section class="hero container">
        <div class="mt-5">
            <div class="row ms-3">
                <div class="col-md-6">
                    <h1 class="fw-bold">
                        Casa Barber<br>
                    </h1>

                    <p class="text-muted mt-3">
                        Temukan tukang cukur profesional yang membuat rambut Anda terlihat
                    <div id="typing">Tampan dan Rapi</div>
                    <div id="line">|</div>
                    </p>

                    <a href="{{ url('user/booking') }}" class="btn btn-color-theme pe-4 ps-4 pt-2 mt-3">
                        Pesan Sekarang
                    </a>

                    <a href="{{ url('user/login') }}" class="btn btn-outline-theme pe-4 ps-4 pt-2 mt-3">
                        Get Invoices
                    </a>
                </div>

                <div class="col-md-6 mt-2">
                    <img class="img-banner img-fluid" src="{{ asset('main/img/banner.svg') }}" width="500px"
                        alt="barber logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Service-->
    <span id='service'></span>
    <section class="popular-barber bg-theme pt-2 pb-2 mt-5">
        <div class="container">
            <div class="row">
                <h3 class="fw-bold ms-3">
                    Daftar
                    <span class="text-theme">Layanan</span>
                </h3>
                <hr>
            </div>

            <div class="row mt-3">

                @foreach($services as $row)
                    <div class="col-md-4 mt-3">
                        <div class="card border-radius-10 p2">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <img src="{{ asset('main/img/' . $row->Image) }}" alt="Buzz Cut" width="100"
                                            class="border-radius-10 img-fluid" />
                                    </div>

                                    <div class="col-md-8 mt-2">
                                        <a class="text-decoration-none text-dark">
                                            <h5 class="ms-2 fw-bold">{{ $row->ServiceName }}</h5>
                                        </a>
                                        <small class="ms-2 fw-bold text-theme">Pelanggan</small>
                                        <br />
                                        <small class="text-muted ms-2">
                                            <i data-feather="map-pin" width="16px"></i>Katapang, Bandung
                                        </small>
                                    </div>

                                </div>

                                <h5 class="fw-bold ms-1 mt-4">Service description</h5>

                                <p class="text-muted ms-1 mb-2">
                                    {{ $row->ServiceDescription }}
                                </p>

                                <h5 class="font-weight-bold price-theme mt-3 ms-1">
                                    Biaya layanan: Rp.{{ $row->Cost }}k
                                </h5>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Service End -->

    {{-- CONTACT --}}
    <section class="about mt-5 pd-5" id="contact">
        <div class="container">

            <div class="row mt-5">
                <div class="col-md-6">
                    <img src="{{ asset('main/img/aboutBarber.svg') }}" width="500px" class="img-fluid"
                        alt="contact Image">
                </div>

                <div class="col-md-6">
                    <h2 class="fw-bold">Kontak</h2>
                    <hr>

                    <div class="map-content-9 mt-lg-0 mt-4">

                        @if (session('info'))
                            <div class="alert alert-success text-center">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="{{ url('proses/prosess.php') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="twice-two col-6">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                        required autocomplete="off" style="height:50px;">
                                </div>

                                <div class="twice-two col-6">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required
                                        style="height:50px;">
                                </div>
                            </div>

                            <textarea class="form-control message" name="pesan" maxlength="500" placeholder="Pesan"
                                required style="height: 138px;"></textarea>

                            <button type="submit" class="btn btn-outline-theme pe-4 ps-4 pt-2 mt-3">
                                Kirim Pesan
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            {{-- FAQ --}}
            <div class="row">
                <div class="col-md-6 mt-5">
                    <h1 class="fw-bold mt-5">
                        Pertanyaan yang Sering Diajukan
                        <span class="text-theme">(F.A.Q)</span>
                    </h1>
                    <hr>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNol">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseNol" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <p>
                                        Berapa harga potongan rambut di Casa Barbershop?
                                    </p>
                                </button>
                            </h2>
                            <div id="flush-collapseNol" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingNol" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Harga potongan bervariasi tergantung jenis potongan yag
                                    diinginkan.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <p>
                                        Apakah disini ada mencuci rambut?
                                    </p>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Casa Barbershop barbershop cenderung tidak melakukan itu,
                                    jadi jika rambut Anda telah selesai anda bisa langsung pulang.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <p>
                                        Apakah kita bisa melihat riwayat pembayaran?
                                    </p>
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Tentu saja Casa Barbershop barbershop bisa melihat riwayat
                                    pembayaran dengan cara login terlebih dahulu ke Get invoices</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    <p>
                                        Apa yang harus dilakukan jika tidak puas dengan hasil potongan rambut?
                                    </p>
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Sebaiknya langsung berbicara dengan penata rambut untuk
                                    memperbaiki potongan rambut dan mencari solusi yang memuaskan kedua belah pihak.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <img src="{{ asset('main/img/aboutBarber 2.svg') }}" width="600px" class="img-fluid">
                </div>
            </div>

            {{-- LOCATION --}}
            @foreach ($locations as $loc)
                <div class="row mt-5">
                    <div class="col-md-6">
                        {!! $loc->PageDescription !!}
                    </div>

                    <div class="col-md-6">
                        <h2 class="fw-bold">{{ $loc->PageTitle }}</h2>
                        <hr>

                        <p class="text-muted">
                            Casa Barbershopbelum membuka cabang yang lain hanya terdapat di lokasi tersebut yang bisa
                            anda datangi.
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    {{-- FOOTER --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script> feather.replace(); </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>

</body>

</html>
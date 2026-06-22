<!-- Footer Start -->
<section class="footer bg-theme ps-3 pe-3">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <span id="about"></span>

                @foreach ($about as $row)
                    <img src="{{ asset('main/img/logox.png') }}" width="38" alt="Logo barber">
                    <span class="fw-bold">{{ $row->PageTitle }}</span>

                    <p class="text-muted">
                        {{ $row->PageDescription }}
                    </p>
                @endforeach
            </div>

            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">tautan langsung</h6>
                <ul class="list-group list-unstyled">
                    <li class="pb-2">
                        <a href="#contact" class="text-muted text-decoration-none">Kontak</a>
                    </li>
                    <li class="pb-2">
                        <a href="#invoices" class="text-muted text-decoration-none">Invoice</a>
                    </li>
                    <li class="pb-2">
                        <a href="#profile" class="text-muted text-decoration-none">Profile</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">Beberapa tautan</h6>
                <ul class="list-group list-unstyled">
                    <li class="pb-2">
                        <a href="#" class="text-muted text-decoration-none">Cookie Police</a>
                    </li>
                    <li class="pb-2">
                        <a href="#" class="text-muted text-decoration-none">Support</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2">
                <h6 class="fw-bold">Office</h6>
                <p class="text-muted">
                    casabarber@gmail.com<br>
                    Indonesia, Earth
                </p>
            </div>

            <hr>
        </div>

        <p class="text-center mt-2">
            Copyright &copy;
            <strong>2023</strong>,
            All right reserved | CasaBarber Develop
        </p>
    </div>
</section>
<!-- Footer End -->

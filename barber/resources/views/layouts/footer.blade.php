{{-- ================= FOOTER ================= --}}
<section class="footer bg-theme ps-3 pe-3">
    <div class="container">
        <div class="row">

            {{-- ABOUT US --}}
            <div class="col-md-5">
                <span id='about'></span>

                @if(isset($about))
                    <img src="{{ asset('main/img/logox.png') }}" width="38" alt="Logo barber">
                    <span class="fw-bold">{{ $about->PageTitle }}</span>
                    <p class="text-muted">{{ $about->PageDescription }}</p>
                @endif
            </div>

            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">tautan langsung</h6>
                <ul class="list-group list-unstyled">
                    <li class="pb-2"><a href="#contact" class="text-muted text-decoration-none">Kontak</a></li>
                    <li class="pb-2"><a href="#faq" class="text-muted text-decoration-none">F.A.Q</a></li>
                    <li class="pb-2"><a href="#location" class="text-muted text-decoration-none">Lokasi</a></li>
                </ul>
            </div>

            <div class="col-md-2 mb-3">
                <h6 class="fw-bold">Beberapa tautan</h6>
                <ul class="list-group list-unstyled">
                    <li class="pb-2"><a href="./error/error.html" class="text-muted text-decoration-none">Cookie
                            Police</a></li>
                    <li class="pb-2"><a href="./error/error.html" class="text-muted text-decoration-none">Support</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2">
                <h6 class="fw-bold">Office</h6>
                <p class="text-muted">
                    casabarber@gmail.com <br>
                    Indonesia, Earth
                </p>
            </div>

            <hr>
        </div>

        <p class="text-center mt-2">
            Copyright &copy;
            <strong><span class="text-theme"></span>2023,</strong>
            All right reserved | CasaBarber Develop
        </p>
    </div>
</section>
{{-- ================= END FOOTER ================= --}}

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    feather.replace();
    AOS.init();
</script>
</body>

</html>
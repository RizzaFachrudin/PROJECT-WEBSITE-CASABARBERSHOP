@extends('layouts.app')

@section('title', 'Pesan Antrean')

@section('content')
<section class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="fw-bold mb-4 text-center">Formulir Pesan Antrean</h2>

            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="card p-4 shadow">
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama_pelanggan"
                               class="form-control"
                               value="{{ old('nama_pelanggan') }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Pilih Layanan</label>
                        <select name="service_id" id="service_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Layanan --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->ID }}"
                                    data-cost="{{ $service->Cost }}"
                                    {{ ($selectedServiceId ?? null) == $service->id ? 'selected' : '' }}>
                                    {{ $service->ServiceName }}
                                    (Rp {{ number_format($service->Cost * 1000, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Metode Pembayaran</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                   name="metode_pembayaran" value="Cash" required>
                            <label class="form-check-label">Tunai (Bayar di tempat)</label>
                        </div>
                    </div>

                    <div class="alert alert-info" id="biaya_info" style="display:none;">
                        Total Biaya: <span id="display_cost"></span>
                    </div>

                    <button class="btn btn-primary w-100 mt-3 btn-color-theme" type="submit">
                        Konfirmasi Pemesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.getElementById('service_id').addEventListener('change', function () {
    const cost = this.options[this.selectedIndex].dataset.cost;
    if (cost) {
        const total = parseInt(cost) * 1000;
        document.getElementById('display_cost').textContent =
            'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('biaya_info').style.display = 'block';
    }
});
</script>
@endpush

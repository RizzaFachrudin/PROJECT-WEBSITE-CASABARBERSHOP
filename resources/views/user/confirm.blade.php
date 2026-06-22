@extends('layouts.app')

@section('title', 'Konfirmasi Antrean')

@push('styles')
<style>
@media print {
    .navbar, .footer, .no-print {
        display: none;
    }
    .print-area {
        width: 100%;
        margin: 0;
        padding: 20px;
        border: none !important;
    }
    .nomor-besar {
        font-size: 5rem !important;
    }
}
</style>
@endpush

@section('content')
<section class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-5 shadow print-area">

                <h2 class="fw-bold mb-4 text-center">
                    Antrean Anda Berhasil Dipesan!
                </h2>

                <p class="text-center">
                    Tunjukkan detail ini kepada staf kami.
                </p>

                <div class="text-center my-4">
                    <h5 class="text-muted">Nomor Antrean / Invoice:</h5>
                    <p class="fw-bolder text-theme nomor-besar">
                        {{ $invoice->BillingId }}
                    </p>
                </div>

                <hr>

                <table class="table table-borderless">
                    <tr>
                        <td class="fw-bold">Layanan Dipilih</td>
                        <td>: {{ $invoice->ServiceName }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Total Biaya</td>
                        <td>: Rp {{ number_format($invoice->Total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Metode Bayar</td>
                        <td>: Cash</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Status Pembayaran</td>
                        <td>:
                            <span class="badge {{ $invoice->Paid ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $invoice->Paid ? 'Paid' : 'Pending' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Status Antrean</td>
                        <td>:
                            <span class="badge
                                @if ($invoice->Status === 'waiting') bg-warning text-dark
                                @elseif ($invoice->Status === 'process') bg-primary
                                @else bg-success
                                @endif">
                                {{ ucfirst($invoice->Status) }}
                            </span>
                        </td>
                    </tr>
                </table>

                <div class="d-grid gap-2 mt-4 no-print">
                    <button onclick="window.print()" class="btn btn-outline-theme">
                        Cetak Antrean Ini
                    </button>

                    <a href="{{ route('booking.form') }}" class="btn btn-color-theme">
                        Booking Lagi
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

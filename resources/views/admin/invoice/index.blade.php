@extends('admin.layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Invoice / Antrean</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Invoice</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->BillingId }}</td>
                            <td>{{ $invoice->nama }}</td>
                            <td>{{ $invoice->invoicedate }}</td>

                            {{-- STATUS --}}
                            <td>
                                @if($invoice->Status === 'waiting')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif($invoice->Status === 'process')
                                    <span class="badge bg-primary">Diproses</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>

                            {{-- ACTION --}}
                            <td>
                                <a href="{{ route('admin.invoices.show', $invoice->BillingId) }}"
                                    class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                @if($invoice->Status === 'waiting')
                                    <form action="{{ route('admin.invoices.process', $invoice->BillingId) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">
                                            Proses
                                        </button>
                                    </form>
                                @elseif($invoice->Status === 'process')
                                    <form action="{{ route('admin.invoices.complete', $invoice->BillingId) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm">
                                            Selesai
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('admin.invoices.print', $invoice->BillingId) }}"
                                   class="btn btn-secondary btn-sm">
                                    Print
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Tidak ada antrean
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</section>
@endsection

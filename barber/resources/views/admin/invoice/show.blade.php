@extends('admin.layouts.master')

@section('content')

<div class="pagetitle">
    <h1>Invoice Detail</h1>
</div>

<div class="card" id="printArea">
    <div class="card-body">

        <h4 class="mb-3">
            Invoice #{{ $invoice->BillingId }}
            <span class="float-end">
                @if($invoice->Status === 'waiting')
                    <span class="badge bg-warning">Menunggu</span>
                @elseif($invoice->Status === 'process')
                    <span class="badge bg-primary">Diproses</span>
                @else
                    <span class="badge bg-success">Selesai</span>
                @endif
            </span>
        </h4>

        {{-- CUSTOMER --}}
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $invoice->nama ?? '-' }}</td>
                <th>No HP</th>
                <td>{{ $invoice->number ?? '-' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $invoice->email ?? '-' }}</td>
                <th>Tanggal</th>
                <td>{{ date('d-m-Y', strtotime($invoice->PostingDate)) }}</td>
            </tr>
        </table>

        {{-- SERVICE --}}
        <table class="table table-bordered mt-3">
            <tr class="table-light">
                <th>Service</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td>{{ $invoice->ServiceName }}</td>
                <td>{{ $invoice->Total }} </td>
            </tr>
        </table>

        {{-- ACTION --}}
        <div class="mt-3 text-center">
            @if($invoice->Status === 'waiting')
                <form action="{{ route('admin.invoices.process', $invoice->BillingId) }}"
                      method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-primary">Proses</button>
                </form>
            @elseif($invoice->Status === 'process')
                <form action="{{ route('admin.invoices.complete', $invoice->BillingId) }}"
                      method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-success">Selesai</button>
                </form>
            @endif

            <button onclick="printInvoice()" class="btn btn-secondary">
                Print Struk
            </button>
        </div>

    </div>
</div>

<script>
function printInvoice() {
    let content = document.getElementById("printArea").innerHTML;
    let win = window.open('', '', 'width=900,height=700');
    win.document.write(content);
    win.document.close();
    win.print();
}
</script>

@endsection

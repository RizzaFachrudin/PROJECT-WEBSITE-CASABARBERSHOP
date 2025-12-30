@extends('admin.layouts.master')

@section('title', 'Add Customer')

@section('content')

    <div class="pagetitle">
        <h1>Assign Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Assign Service</li>
            </ol>
        </nav>
    </div>

    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <div class="table-responsive bs-example widget-shadow">

                    {{-- Form Method POST ke Controller:createInvoice --}}
                    {{-- Rute menggunakan nama yang sudah didaftarkan di routes/web.php --}}
                    <form method="POST" action="{{ route('admin.customers.invoice', $customer->id) }}">
                        @csrf

                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Service Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $service->ServiceName }}</td>

                                        <td>{{ $service->Cost }}K</td>

                                        <td class="text-center">
                                            <input class="form-check-input" type="checkbox" name="sids[]"
                                                value="{{ $service->ID }}">
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="4" align="center">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts.master')

@section('title', 'Dashboard - Admin Area')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                {{-- Menggunakan route() untuk link --}}
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li> 
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Hair <span>| Model</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class='bx bx-knife bx-flip-horizontal bx-tada' style='color:#4153f1' ></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            {{-- Data ini diasumsikan dikirim dari Controller, menggantikan mysqli_num_rows--}}
                                            {{ $totalServices ?? 0 }} 
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">Total Layanan</span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Customer <span>| Service</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class='bx bxs-user bx-tada' style='color:#4153f1'></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            {{-- Data ini diasumsikan dikirim dari Controller, menggantikan mysqli_num_rows--}}
                                            {{ $totalCustomers ?? 0 }}
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">Total Customer</span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
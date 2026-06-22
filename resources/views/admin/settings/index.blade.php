@extends('admin.layouts.master')

@section('title', 'Setting - Admin Area')

@section('content')

    <div class="pagetitle">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Setting</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="card">
            <div class="card-body pt-3">

                {{-- Alert Error --}}
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Alert Success --}}
                @if (session('success'))
                    <div class="alert alert-primary text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.settings.password') }}">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">
                            Current Password
                        </label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">
                            New Password
                        </label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" name="newpassword" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">
                            Re-enter New Password
                        </label>
                        <div class="col-md-8 col-lg-9">
                            <input type="password" name="renewpassword" class="form-control">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">
                            Change Password
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection
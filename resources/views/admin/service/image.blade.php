@php
    /**
     * @var \App\Models\Service $service
     */
@endphp

@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Update Service Image</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('admin.services.updateImage', $service->ID) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-2">
                        <label>Service Name</label>
                        <input type="text" class="form-control" value="{{ $service->ServiceName }}" readonly>
                    </div>

                    <div class="form-group mt-3">
                        <label>Current Image</label><br>
                        <img src="{{ asset('admin/img/' . $service->Image) }}" width="120">
                    </div>

                    <div class="form-group mt-3">
                        <label>New Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <button class="btn btn-primary mt-3">
                        Update Image
                    </button>

                    <a href="{{ route('admin.services.edit', $service->ID) }}" class="btn btn-danger mt-3">
                        Back
                    </a>
                </form>

            </div>
        </div>
    </section>
@endsection
@php
    /**
     * @var \App\Models\Service $service
     */ 
@endphp

@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Edit Service</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <form method="POST" action="{{ route('admin.services.update', $service->ID) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label>Service Name</label>
                        <input type="text" name="sername" class="form-control"
                            value="{{ old('sername', $service->ServiceName) }}" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Service Description</label>
                        <textarea name="serdesc" class="form-control"
                            required>{{ old('serdesc', $service->ServiceDescription) }}</textarea>
                    </div>

                    <div class="form-group mt-2">
                        <label>Cost</label>
                        <input type="number" name="cost" class="form-control" value="{{ old('cost', $service->Cost) }}"
                            required>
                    </div>

                    <button class="btn btn-primary mt-3">
                        Update
                    </button>

                    <a href="{{ route('admin.services.editImage', $service->ID) }}" class="btn btn-warning mt-3">
                        Update Image
                    </a>

                    <a href="{{ route('admin.services.index') }}" class="btn btn-danger mt-3">
                        Back
                    </a>

                </form>

            </div>
        </div>
    </section>
@endsection
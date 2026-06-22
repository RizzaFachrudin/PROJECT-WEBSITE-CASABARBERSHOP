@extends('admin.layouts.master')

@section('title', 'Update About Us')

@section('content')

    <div class="pagetitle">
        <h1>Update About Us</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Update About Us</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                {{-- Alert --}}
                @if(session('success'))
                    <div class="alert alert-primary text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.pages.update', $page->PageType) }}">
                    @csrf

                    <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" name="pagetitle" class="form-control mt-1"
                            value="{{ old('pagetitle', $page->PageTitle) }}" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Page Description</label>
                        <textarea name="pagedes" rows="5" class="form-control mt-2"
                            required>{{ old('pagedes', $page->PageDescription) }}</textarea>
                    </div>

                    <button class="btn btn-primary mt-2">
                        Update
                    </button>
                </form>

            </div>
        </div>
    </section>

@endsection
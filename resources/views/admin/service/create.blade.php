@extends('admin.layouts.master')

{{-- Bagian Title --}}

@section('title', 'Add Service')

@section('content')

  <div class="pagetitle">
    <h1>Add Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Add Service</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        {{-- Form diarahkan ke ServiceController@store --}}
        <form method="post" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
          @csrf

          {{-- Menampilkan pesan error validasi --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- Menggantikan
          <?php if (isset($_GET['info'])) { ?>... --}}
          @if (session('success'))
            <div class="alert alert-success text-center" role="alert">
              {{ session('success') }}
            </div>
          @endif

          <div class="form-group">
            <label for="sername">Service Name</label>
            <input type="text" class="form-control mt-1" id="sername" name="sername" placeholder="Service Name"
              value="{{ old('sername') }}" required="true">
          </div>

          <div class="form-group mt-2">
            <label for="serdesc">Service Description</label>
            <textarea class="form-control mt-1" id="serdesc" name="serdesc" placeholder="Service Description"
              required="true">{{ old('serdesc') }}</textarea>
          </div>

          <div class="form-group mt-2">
            <label for="cost">Cost</label>
            <input type="text" id="cost" name="cost" class="form-control mt-1" placeholder="Cost"
              value="{{ old('cost') }}" required="true">
          </div>

          <div class="form-group mt-2">
            <label for="image">Images</label>
            <input type="file" class="form-control mt-1" id="image" name="image" required="true">
          </div>

          <button type="submit" name="submit" class="btn btn-primary mt-2">Add</button>
        </form>
      </div>
    </div>
  </section>
  </main>
@endsection

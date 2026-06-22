@extends('admin.layouts.master')

@section('title', 'Customer List')


@section('content')
    <div class="pagetitle">
        <h1>Customer Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Customer Service</li>
            </ol>
        </nav>
    </div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $index => $customer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $customer->nama }}</td>
                            <td>{{ $customer->number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{\Carbon\Carbon::parse($customer->created_at)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.customers.invoice.create', $customer->id) }}"
                                    class="btn btn-primary btn-sm">Assign
                                    Services</a>


                                <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST"
                                    style="display:inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus customer ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
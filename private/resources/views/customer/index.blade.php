@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customer Management</h1>
        <a href="{{ route('customer.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add New Customer</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">List Details</div>
                    <div class="card-body">
                        <!-- Component Preview-->
                        <table class="table table-bordered">
                            <thead>
                                <th class="inner-table align-middle text-center">No</th>
                                <th class="inner-table align-middle text-left">Name</th>
                                <th class="inner-table align-middle text-left">Mobile</th>
                                <th class="inner-table align-middle text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                <tr>
                                    <td class="inner-table align-middle text-center">{{ $key+1 }}</td>
                                    <td class="inner-table align-middle text-left">{{ $customer->name }}</td>
                                    <td class="inner-table align-middle text-left">{{ $customer->mobile }}</td>
                                    <td class="inner-table align-middle text-center">
                                        <form action="{{ route('customer.destroy', ['customer' => $customer->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('customer.show', ['customer' => $customer->id]) }}" title="Show Customer Details" style="padding-right: 5px;"><i class="fas fa-eye text-success fa-lg"></i></a>
                                            <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}" title="Edit Customer Details" style="padding-right: 5px;"><i class="fas fa-edit fa-lg"></i></a>
                                            <button type="submit" title="Delete Customer" style="border:none;background-color:transparent;padding:0px;"><i class="fas fa-trash fa-lg text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
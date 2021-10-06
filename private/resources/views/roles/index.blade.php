@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role Management</h1>
        <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add New Role</a>
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
                                <th class="inner-table align-middle text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="inner-table align-middle text-center">{{ $key+1 }}</td>
                                    <td class="inner-table align-middle text-left">{{ $role->name }}</td>
                                    <td class="inner-table align-middle text-center">
                                        <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('roles.show', ['role' => $role->id]) }}" title="Show Role Details" style="padding-right: 5px;"><i class="fas fa-eye text-success fa-lg"></i></a>
                                            <a href="{{ route('roles.edit', ['role' => $role->id]) }}" title="Edit Role Details" style="padding-right: 5px;"><i class="fas fa-edit fa-lg"></i></a>
                                            <button type="submit" title="Delete Role" style="border:none;background-color:transparent;padding:0px;"><i class="fas fa-trash fa-lg text-danger"></i></button>
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
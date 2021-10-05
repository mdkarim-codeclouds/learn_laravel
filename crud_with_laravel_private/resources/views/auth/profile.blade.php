@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> 
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Edit Form</div>
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form method="POST" action="{{ route('user.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter Name" value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">E-Mail</label>
                                        <input class="form-control" id="email" type="text" name="email" placeholder="Enter E-Mail" value="{{ $user->email }}">
                                    </div>
                                    <!-- Divider -->
                                    <hr class="sidebar-divider">
                                    <div class="mb-0 text-right">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Edit</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Check the errors below</strong>
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
                                <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <input type="hidden" name="old_thumbnail_image" value="{{ $product->thumbnail_image }}">
                                        @if ($product->thumbnail_image)
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="thumbnail_image">Thumbnail Image</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" name="thumbnail_image" id="thumbnail_image" class="custom-file-input">
                                                    <label class="custom-file-label" for="thumbnail_image">Choose File...</label>
                                                </div>
                                                @error('thumbnail_image')
                                                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ $product->thumbnail_image }}" class="img-fluid img-thumbnail" width="90">
                                            </div>
                                        </div>
                                        @else
                                        <label for="thumbnail_image">Thumbnail Image</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="thumbnail_image" id="thumbnail_image" class="custom-file-input">
                                            <label class="custom-file-label" for="thumbnail_image">Choose File...</label>
                                        </div>
                                        @error('thumbnail_image')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                        @endif
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <input type="hidden" name="old_large_image" value="{{ $product->large_image }}">
                                        @if ($product->large_image)
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="large_image">Large Image</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" name="large_image" id="large_image" class="custom-file-input">
                                                    <label class="custom-file-label" for="large_image">Choose File...</label>
                                                </div>
                                                @error('large_image')
                                                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ $product->large_image }}" class="img-fluid img-thumbnail" width="150">
                                            </div>
                                        </div>
                                        @else
                                        <label for="large_image">Large Image</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="large_image" id="large_image" class="custom-file-input">
                                            <label class="custom-file-label" for="large_image">Choose File...</label>
                                        </div>
                                        @error('large_image')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                        @endif
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <label for="name">Product Name</label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter Name" value="{{ $product->name }}">
                                        @error('name')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <label for="description">Product Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description">{{ $product->description }}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <label for="count">Stock Quantity</label>
                                        <input class="form-control" id="count" type="number" name="count" placeholder="Enter Count" value="{{ $product->count }}">
                                        @error('count')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <label for="price">Product Price</label>
                                        <input class="form-control" id="price" type="number" name="price" placeholder="Enter Price" value="{{ $product->price }}">
                                        @error('price')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <label for="discount_price">Discount Price</label>
                                        <input class="form-control" id="discount_price" type="number" name="discount_price" placeholder="Enter Discount" value="<?= $product->discount_price ? $product->discount_price : '' ?>">
                                        @error('discount_price')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="mb-3">
                                        <label for="discount_start_date">Product Discount Date Limit</label>
                                        <div class="form-row align-items-center">
                                            <div class="col-auto">
                                                <input class="form-control" id="discount_start_date" type="date" name="discount_start_date" placeholder="Enter Start date" value="<?= $product->discount_start_date ? \Carbon\Carbon::parse($product->discount_start_date)->format('Y-m-d') : '' ?>">
                                            </div> TO 
                                            <div class="col-auto">
                                                <input class="form-control" id="discount_end_date" type="date" name="discount_end_date" placeholder="Enter End date" value="<?= $product->discount_end_date ? \Carbon\Carbon::parse($product->discount_end_date)->format('Y-m-d') : '' ?>">
                                            </div>
                                        </div>
                                        @error('discount_start_date')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
                                        @error('discount_end_date')
                                        <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                                        @enderror
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
@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product List</h1>
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
                                <th class="inner-table align-middle text-center">Image</th>
                                <th class="inner-table align-middle text-left">Name</th>
                                <th class="inner-table align-middle text-left">Description</th>
                                <th class="inner-table align-middle text-center">Count</th>
                                <th class="inner-table align-middle text-right">Price</th>
                                <th class="inner-table align-middle text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="inner-table align-middle text-center">
                                        <img class="img-fluid img-thumbnail" src="<?= $product->thumbnail_image ? $product->thumbnail_image : url('uploads/products/blank.jpg') ?>" alt="{{ $product->name }}" width="90">
                                    </td>
                                    <td class="inner-table align-middle text-left">{{ $product->name }}</td>
                                    <td class="inner-table align-middle text-left">{{ $product->description }}</td>
                                    <td class="inner-table align-middle text-center">{{ $product->count }}</td>
                                    <td class="inner-table align-middle text-right">&#8377;{{ $product->price }}</td>
                                    <td class="inner-table align-middle text-center">
                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('products.show', ['product' => $product->id]) }}" title="Show Product Details" style="padding-right: 5px;"><i class="fas fa-eye text-success fa-lg"></i></a>
                                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" title="Edit Product Details" style="padding-right: 5px;"><i class="fas fa-edit fa-lg"></i></a>
                                            <button type="submit" title="Delete Product" style="border:none;background-color:transparent;padding:0px;"><i class="fas fa-trash fa-lg text-danger"></i></button>
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
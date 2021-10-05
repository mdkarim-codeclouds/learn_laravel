@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">Info Box</div>
                    <div class="card-body">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-5 text-center">
                                        <img src="<?= $product->large_image ? $product->large_image : url('uploads/products/blank.jpg') ?>" class="img-fluid" width="250">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-7">
                                        <h2>{{ $product->name }}</h2>
                                        <hr class="sidebar-divider">
                                        <h4 data-s="{{ $product->discount_end_date }}">
                                            <?php if($product->discount_start_date && $product->discount_end_date){
                                                $discount_start_date = new DateTime( $product->discount_start_date );
                                                $discount_start_date_timestamp = strtotime($discount_start_date->format("Y-m-d"));
                                                $discount_end_date = new DateTime( $product->discount_end_date );
                                                $discount_end_date_timestamp = strtotime($discount_end_date->format("Y-m-d"));
                                                $current_date_timestamp = strtotime(date("Y-m-d"));
                                                if($discount_start_date_timestamp <= $current_date_timestamp && $discount_end_date_timestamp >= $current_date_timestamp){
                                                    echo "&#8377;".($product->price - $product->discount_price).' <del style="font-size:70%;color:red;">&#8377;'.$product->price.'</del>';
                                                }else{
                                                    echo "&#8377;".$product->price;
                                                }
                                            }else{
                                                echo "&#8377;".$product->price;
                                            } ?>
                                        </h4>
                                        <p>{{ $product->description }}</p>
                                        <hr class="sidebar-divider">
                                        <div class="form-group">
                                            <strong>Stock Left</strong>: {{ $product->count }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
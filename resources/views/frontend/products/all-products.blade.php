@extends('frontend.layouts.master')
@section('tittle','All Products')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">All Products</h2>
    @foreach ($products as $product)
     @php
         $image = explode(',', $product->images)
     @endphp
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ asset('images/products/'.$image[0])}}" alt="">
                    <h2>Rs. {{ $product->price}}</h2>
                    <p>{{$product->name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>Rs. {{ $product->price}}</h2>
                        <p>{{ $product->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{route('product.detail',$product->id)}}"><i class="fa fa-plus-square"></i>Product Detail</a></li>
                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach

</div>
<div class="d-flex justify-content-left align-items-left">
   <ul>
       <li>{{$products->links()}}</li>
   </ul>
</div>
@endsection
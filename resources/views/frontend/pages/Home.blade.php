@extends('frontend.layouts')

@section('title', 'Home')

@section('content')

@include('frontend.components.slider')

<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Temukan Parfume Terbaikmu</h1>
            <p>
                Kenali karakteristik yang cocok untukmu dari parfume axlir
            </p>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-12 col-md-4 p-5 mt-3">
            <div class="container">
                <img src="{{ asset('frontend/img/logo/banner-spek.jpg') }}" alt="" srcset="">
            </div>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <div class="container">
                <img src="{{ asset('frontend/img/logo/banner-spek.jpg') }}" alt="" srcset="">
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <a href="#">
                    <img src="{{ asset('frontend/img/logo/banner-spek.jpg') }}" alt="Banner" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
    
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Featured Product</h1>
                <p>
                    Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @php
                            $file = App\Models\ProductFile::where('product_id', $product->id)->get();
                        @endphp
                        <a href="{{ route('user.product.detail', $product->id) }}">
                            <img src="{{ asset($file[0]->path_file) }}" class="card-img-top" alt="{{ $product->product_name }}">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">@currency($product->price)</li>
                            </ul>
                            <a href="{{ route('user.product.detail', $product->id) }}" class="h2 text-decoration-none text-dark">{{ $product->product_name }}</a>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
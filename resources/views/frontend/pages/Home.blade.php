@extends('frontend.layouts')

@section('title', 'Home')

@section('content')

@include('frontend.components.slider')

<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h4 class="h1"><b>Kenali karakteristik dari parfume kami</b></h4>
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
                <a href="{{ url('main-accords') }}">
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
                <h1 class="h1"><b>Koleksi Parfum Kami</b></h1>
                <p>
                    Temukan aroma yang mencerminkan kepribadian anda.
                </p>
            </div>
        </div>
        <div class="row">
            {{-- @foreach ($products as $product)
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
                        </div>
                    </div>
                </div>
            @endforeach --}}
            @foreach ($products as $product)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100 position-relative">
                        @php
                            $file = App\Models\ProductFile::where('product_id', $product->id)->get();
                        @endphp
                        <a href="{{ $product->stock > 0 ? route('user.product.detail', $product->id) : '#' }}" class="position-relative" style="text-decoration: none;">
                            <img src="{{ asset($file[0]->path_file) }}" class="card-img-top" alt="{{ $product->product_name }}">
                            @if($product->stock == 0)
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center" style="background-color: rgba(255, 255, 255, 0.7);">
                                    <p class="text-danger fw-bold">Produk ini habis</p>
                                </div>
                            @endif
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
                            <a href="{{ $product->stock > 0 ? route('user.product.detail', $product->id) : '#' }}" class="h2 text-decoration-none text-dark" style="pointer-events: none; cursor: default;" @if($product->stock > 0) style="pointer-events: auto; cursor: pointer;" @endif>
                                {{ $product->product_name }}
                            </a>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
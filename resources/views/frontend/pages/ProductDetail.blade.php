@extends('frontend.Layouts')

@section('title', 'Product Detail')

@section('content')
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3 ">
                        <iframe style="height: 450px" id="video_detail" class="d-none card-img img-fluid" src="" frameborder="0" class="card-img img-fluid"></iframe>
                        <img class="card-img img-fluid" src="{{ asset($productFile[0]->path_file) }}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <div class="carousel-item active">
                                    <div class="row">
                                        @foreach ($productFile as $file)
                                            @php
                                                $extension = pathinfo($file->path_file, PATHINFO_EXTENSION);
                                            @endphp

                                            @if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp']))
                                                <div class="col-4">
                                                    <a href="#">
                                                        <iframe id="video" width="108" height="108" src="{{ asset($file->path_file) }}" frameborder="0"></iframe>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img id="image" class="card-img img-fluid" src="{{ asset($file->path_file) }}" alt="Product Image 3">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $products->product_name }}</h1>
                            <p class="h3 py-2">@currency($products->price)</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Axlir Parfume</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>
                                {{ $products->description }}
                                .</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Size :</h6>
                                </li>
                                <li class="list-inline-item">
                                    {{-- <p class="text-muted"><strong>50ml / 30ml</strong></p> --}}
                                    <span class="btn btn-success btn-size">{{ $products->size }}</span>
                                </li>
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="button" class="btn btn-success btn-lg" value="buy"
                                            data-bs-toggle="modal" data-bs-target="#modalCheckout">Buy</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>
            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
                @foreach ($relatedProduct as $relatedP)    
                @php
                    $file = App\Models\ProductFile::where('product_id', $relatedP->id)->get();
                @endphp
                <a href="{{ route('user.product.detail', $relatedP->id) }}">
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{ asset($file[0]->path_file) }}">
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h3 text-decoration-none">{{ $relatedP->product_name }}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>{{ $relatedP->size }}</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">@currency($relatedP->price)</p>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Article -->

    <!-- Modal -->
    <div class="modal fade" id="modalCheckout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.transaction.store') }}" method="post">
                        @csrf
                        <div class="">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" class="form-control" name="idProduct"
                                        value="{{ $products->id }}">
                                    <div class="mb-3">
                                        <label for="custName" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="custName" name="custName">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="noHp" class="form-label">Number Phone</label>
                                        <input type="text" class="form-control" id="noHp" name="noHp">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="provinsi" name="provinsi">
                                    <option selected disabled>Pilih Provinsi</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kota">Kota</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="kota" name="kota">
                                    <option selected disabled>Pilih Kota</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="kecamatan" name="kecamatan">
                                    <option selected disabled>Pilih Kecamatan</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="kelurahan">Kelurahan</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="kelurahan" name="kelurahan">
                                    <option selected disabled>Pilih Kelurahan</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            {{-- <label for="size">Size</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="size" name="size">
                                <option selected disabled>Pilih Size</option>
                                <option value="50ml">50ml</option>
                                <option value="30ml">30ml</option>
                            </select> --}}
                            <input type="hidden" name="size" value="{{ $products->size }}" />
                        </div>

                        <div class="mb-3 hidden">
                            <input type="hidden" value="{{ $products->price }}" name="price">
                        </div>

                        <div class="mb-3">
                            <input type="hidden" value="@currency($products->price)" name="priceProduct">
                            <label for="qty" class="form-label">QTY</label>
                            <input type="number" class="form-control" id="qty" name="qty">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Berikan alamat lengkap seperti : No rumah, nama jalan, kode pos dll."
                                id="address" name="detailAlamat"></textarea>
                            <label for="address"></label>
                        </div>
                        
                        {{-- payment method --}}
                        <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <img src="{{ asset('frontend/img/method/bca1.png') }}" width="80"
                                            alt="">
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">No rekening bca</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <img src="{{ asset('frontend/img/method/mandiri1.png') }}" width="80"
                                            alt="">
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">no rekening mandiri</div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

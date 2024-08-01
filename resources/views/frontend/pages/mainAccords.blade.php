@extends('frontend.Layouts')

@section('title', 'Main Accords')

@section('content')
<div class="container">
    <h3 class="mt-4 text-center">Ketahui wangian dari produk kami</h3>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-3 mt-4">
            <div class="card">
                <img src="{{ asset('frontend/img/Accords/accords1.jpg') }}" class="card-img-top" alt="" data-lightbox="bcarat">
                <div class="card-body">
                    <h5 class="card-title">Bcarat</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3 mt-4">
            <div class="card">
                <img src="{{ asset('frontend/img/Accords/accords2.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Dun hill blue</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3 mt-4">
            <div class="card">
                <img src="{{ asset('frontend/img/Accords/accords3.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Black Op</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3 mt-4">
            <div class="card">
                <img src="{{ asset('frontend/img/Accords/accords4.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Scandal Us</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3 mt-4">
            <div class="card">
                <img src="{{ asset('frontend/img/Accords/accords5.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Roma wis</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset('frontend/img/Accords/accords1.jpg') }}" class="img-fluid" alt="" data-bs-toggle="modal" data-bs-target="#exampleModal">
        </div>
      </div>
    </div>
  </div>
@endsection
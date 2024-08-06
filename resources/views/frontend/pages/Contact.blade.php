@extends('frontend.Layouts')

@section('title', 'Hubungi Kami')

@section('content')
     <!-- Start Content Page -->
     <div class="container-fluid bg-light py-5" style="background: #9BB1C1;">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1"><b>Hubungi Kami</b></h1>
            <p class="fw-400"> 
                Kami siap melayani untuk setiap pertanyaan ataupun keluhan yang anda alami 
                dari produk kami
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form action="{{ route('user.complaint') }}" class="col-md-9 m-auto" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nama Lengkap</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="noHp">No HP</label>
                        <input type="text" class="form-control mt-1" id="noHp" name="noHp" placeholder="no handphone" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Email</label>
                    <input type="email" class="form-control mt-1" id="subject" name="subject" placeholder="@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Pesan</label>
                    <textarea class="form-control mt-1" id="message" name="pesan" placeholder="Pesan" rows="8" required></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-lg px-3" style="background: #9BB1C1; color: white;">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->
@endsection
@extends('frontend.Layouts')

@section('title', 'Tentang Kami')

@section('content')
<section class="py-5" style="background: #9BB1C1;">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>Tentang Kami</h1>
                <p>
                    Selamat datang di D'Main, di mana setiap tetes parfum adalah sebuah karya seni. Kami berdedikasi untuk menghadirkan keharuman terbaik yang tidak hanya memikat, tetapi juga menceritakan kisah dan menghidupkan kenangan.
                </p>
            </div>
            <div class="col-md-4">
                {{-- <img src="{{ asset('frontend/img/about-hero.svg') }}" alt="About Hero"> --}}
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Misi Kami</h1>
            <p class="justify-center text-left">
                Misi kami sederhana: untuk memberikan Anda pengalaman wangi yang tak terlupakan. Kami percaya bahwa parfum lebih dari sekadar wewangian;
                itu adalah ekspresi diri dan cara untuk menambahkan sentuhan keanggunan dan karakter ke dalam setiap momen hidup Anda.
            </p>
        </div>
    </div>
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Kualitas Terbaik</h1>
            <p class="justify-center text-left">
                Kami hanya menggunakan bahan-bahan berkualitas tinggi dari seluruh dunia. 
                Setiap parfum kami dibuat dengan cermat oleh para ahli parfum berpengalaman, memastikan bahwa setiap botol yang Anda terima adalah puncak dari seni dan sains.
            </p>
        </div>
    </div>
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Inovasi dan Kreativitas</h1>
            <p class="justify-center text-left">
                Di D'Main, kami terus berinovasi dan menciptakan keharuman baru yang sesuai dengan tren dan 
                keinginan pelanggan kami. Kami menggabungkan kreativitas dengan teknik pembuatan parfum tradisional untuk menciptakan sesuatu yang unik dan mempesona.
            </p>
        </div>
    </div>
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Komitmen Terhadap Pelanggan</h1>
            <p class="justify-center text-left">
                Kami berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami. 
                Kami percaya bahwa setiap pelanggan adalah bagian dari keluarga besar D'Main, 
                dan kami selalu siap membantu Anda menemukan parfum yang sempurna untuk setiap kesempatan.
            </p>
        </div>
    </div>
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Ramah Lingkungan</h1>
            <p class="justify-center text-left">
                Kami peduli dengan lingkungan dan berusaha untuk menjalankan bisnis kami dengan cara yang berkelanjutan. 
                Dari bahan baku yang kami pilih hingga kemasan produk, kami selalu mencari cara untuk mengurangi jejak lingkungan kami.
            </p>
        </div>
    </div>
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <p class="justify-center text-left">
                Terima kasih telah memilih D'Main. Kami berharap bisa terus menjadi bagian dari perjalanan wangi Anda.
            </p>
        </div>
    </div>
</section>
<!-- End Section -->
@endsection
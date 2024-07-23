@extends('frontend.Layouts')

@section('title', 'Blog')

<style>
    #input-search, #basic-addon2 {
        border-radius: 30px;
    }

    .ul-blog {
        list-style: none;
        padding: 0;
        display: flex;
        margin-top: 40px;
    }

    .li-blog {
        display: inline-block;
        margin-right: 10px;
    }
</style>

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Axlir Blog</h2>
                <div class="search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" id="input-search" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">
                            Search
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">

            </div>
        </div>

        <ul class="ul-blog">
            <li class="li-blog">All</li>
            <li class="li-blog">Parfume</li>
            <li class="li-blog">Fashion</li>
        </ul>

        <hr class="mb-3">

        <div class="row mb-4 mt-4">
            @foreach ($blogs as $blog)
                <div class="col-12 col-md-6 mb-4 mt-4">
                    <div class="card">
                        <img src="{{ asset($blog->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $blog->headline }}</h5>
                        <p class="card-text">{{ $blog->slug }}</p>
                        <p class="card-text"><small class="text-muted">Read post</small><i class="ti ti-corner-right-up-double text-muted"></i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

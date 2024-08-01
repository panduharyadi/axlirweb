@extends('backend.Layouts')

@section('title', 'Create Blog')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Forms</h5>
    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Blog Image</label>
                            <input class="form-control" type="file" name="upload" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="headline" class="form-label">Blog Headline</label>
                            <input type="text" class="form-control" name="headline" id="headline">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="content here" id="content" name="content" style="height: 100px"></textarea>
                            <label for="content"></label>
                        </div>
                        <input type="submit" name="upload" value="Accept" class="btn btn-outline-success">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta" class="form-label">Blog Meta Description</label>
                            <input class="form-control" type="text" name="meta" id="meta">
                        </div>
                        <div class="mb-3">
                            <label for="jadwal" class="form-label">Blog jadwal</label>
                            <input type="date" class="form-control" name="jadwal" id="jadwal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>   
@endsection


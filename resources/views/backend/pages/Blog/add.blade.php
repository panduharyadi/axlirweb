@extends('backend.Layouts')

@section('title', 'Create Blog')

@section('content')
    <h5 class="card-title fw-semibold mb-4">Forms</h5>
    <div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Blog Image</label>
            <input class="form-control" type="file" name="image" id="formFile">
        </div>
        <div class="mb-3">
            <label for="headline" class="form-label">Blog Headline</label>
            <input type="text" class="form-control" name="headline" id="headline">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="content here" id="content" name="content" style="height: 100px"></textarea>
            <label for="content">Contents</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
@endsection
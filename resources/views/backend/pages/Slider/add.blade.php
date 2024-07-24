@extends('backend.Layouts')

@section('title', 'Add Slider')

@section('content')

<h5 class="card-title fw-semibold mb-4">Forms</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="formFile" class="form-label">Slider Image</label>
        <input class="form-control" type="file" name="image" id="formFile">
      </div>
      <div class="mb-3">
        <label for="slider" class="form-label">Slider Headline</label>
        <input type="text" class="form-control" name="headline" id="slider">
      </div>
      <div class="mb-3">
        <label for="intval" class="form-label">set interval slider</label>
        <input type="integer" class="form-control" name="interval" id="intval">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection
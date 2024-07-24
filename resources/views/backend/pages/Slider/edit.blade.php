@extends('backend.Layouts')

@section('title', 'Product Edit')

@section('content')
<h5 class="card-title fw-semibold mb-4">Forms</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.slider.update', $sliders->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="formFile" class="form-label">Slider Image</label>
        <input class="form-control" type="file" name="image" id="formFile" value="{{ $sliders->image }}">
      </div>
      <div class="mb-3">
        <label for="slider" class="form-label">Slider Headline</label>
        <input type="text" class="form-control" name="headline" id="slider" value="{{ $sliders->headline }}">
      </div>
      <div class="mb-3">
        <label for="intval" class="form-label">Set interval slider</label>
        <input type="text" class="form-control" name="interval" id="intval" value="{{ $sliders->interval }}">
      </div>
      <button type="submit" class="btn btn-outline-info btn-block">Submit</button>
    </form>
  </div>
</div>
@endsection
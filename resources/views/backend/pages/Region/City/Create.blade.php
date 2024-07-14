@extends('backend.Layouts')

@section('content')
<div class="card">
    <div class="card-body">
      <form action="{{ route('admin.city.store') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="city_name" class="form-label">City Name</label>
          <input type="text" class="form-control" name="cityName" id="city_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
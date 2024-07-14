@extends('backend.Layouts')

@section('content')
<div class="card">
    <div class="card-body">
      <form action="{{ route('admin.province.store') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="province_name" class="form-label">Province Name</label>
          <input type="text" class="form-control" name="provinceName" id="province_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
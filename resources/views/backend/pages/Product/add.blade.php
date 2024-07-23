@extends('backend.Layouts')

@section('title', 'Product add')

@section('content')

@if (session('success'))
  <script>
    Swal.fire('Success', '{{ session('success') }}', 'success');
  </script>
@endif

<h5 class="card-title fw-semibold mb-4">Forms</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="formFile" class="form-label">Product File</label>
        <input class="form-control" type="file" name="file[]" id="formFile" multiple />
      </div>
      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="productName" id="product_name">
      </div>
      <label for="description" class="form-label">Description</label>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 100px"></textarea>
        <label for="description">Description</label>
      </div>
      <label for="size" class="form-label">Size</label>
      <select class="form-select mb-3" aria-label="Default select example" name="size">
        <option selected disabled>Select Size</option>
        <option value="50ml">50ml</option>
        <option value="30ml">30ml</option>
      </select>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control" name="stock" id="stock">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" id="price">
      </div>
      <button type="submit" class="btn btn-primary" onclick="product()">Submit</button>
    </form>
  </div>
</div>

@endsection
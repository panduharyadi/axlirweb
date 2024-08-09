@extends('backend.Layouts')

@section('title', 'Product edit')

@section('content')
<h5 class="card-title fw-semibold mb-4">Forms</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.product.update', $products->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="formFile" class="form-label">Product File</label>
        <input class="form-control" type="file" name="file[]" id="formFile" multiple />
      </div>
      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="productName" id="product_name" value="{{ $products->product_name }}">
      </div>
      <label for="description" class="form-label">Description</label>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 100px" value="{{ $products->description }}"></textarea>
        <label for="description">Description</label>
      </div>
      <label for="size" class="form-label">Size</label>
      <select class="form-select mb-3" aria-label="Default select example" name="size" value="{{ $products->size }}">
        <option selected disabled value="">Select size</option>
        <option value="50ml">50ml</option>
        <option value="30ml">30ml</option>
      </select>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control" name="stock" id="stock" value="{{ $products->stock }}">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" id="price" value="{{ $products->price }}">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
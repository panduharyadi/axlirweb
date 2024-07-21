@extends('backend.Layouts')

@section('title', 'Add Stock')

@section('content')
<h5 class="card-title fw-semibold mb-4">Stock</h5>
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.stock.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="product" class="form-label">Pilih Product</label>
        <select class="form-select mb-3" aria-label="Default select example" name="productId">
            <option selected disabled>Pilih Productnya</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Input Stock</label>
        <input type="text" class="form-control" name="stock" id="stock">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
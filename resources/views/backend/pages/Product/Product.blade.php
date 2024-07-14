@extends('backend.Layouts')

@section('title', 'Product')

@section('content')

<a href="{{ route('admin.product.add') }}" class="btn btn-primary mt-5">Add Product</a>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Size</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <img src="{{ asset($product->image) }}" alt="" srcset="" style="width: 50px">   
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>@currency($product->price)</td>
                    <td>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">Edit</a> |
                        <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@extends('backend.Layouts')

@section('title', 'List Buyer')

@section('content')
<a href="{{ route('admin.slider.add') }}" class="btn btn-primary mt-5">Add New Slider</a>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>No hp</th>
                <th>Produk</th>
                <th>total</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->cust_name }}</td>
                    <td>{{ $user->noHp }}</td>
                    <td>{{ $user->product_name }}</td>
                    <td>{{ $user->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
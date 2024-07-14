@extends('backend.Layouts')

@section('title', 'Transaction')

@section('content')
<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Price per Product</th>
                <th>Buys</th>
                <th>Total</th>
                <th>Status</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->cust_name }}</td>
                    <td>{{ $transaction->product_name }}</td>
                    <td>{{ $transaction->size }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->qty }}</td>
                    <td>{{ $transaction->total }}</td>
                    <td>
                        <span class="badge bg-warning text-white">{{ $transaction->status }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
</div>
@endsection
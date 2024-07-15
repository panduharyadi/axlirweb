@extends('backend.Layouts')

@section('title', 'Confirm Transaction User')

@section('content')
<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Buys</th>
                <th>Total</th>
                <th>Status</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($confirmTransaction as $confirm)
                <tr>
                    <td>{{ $confirm->cust_name }}</td>
                    <td>{{ $confirm->product_name }}</td>
                    <td>{{ $confirm->qty }}</td>
                    <td>@currency($transaction->total)</td>
                    <td>
                        @if ($confirm->status == "waiting")
                            <a href="{{ route('admin.confirm.transaction.edit', $confirm->id) }}" class="btn btn-warning">waiting</a>
                        @elseif($confirm->status == "rejected")
                            <a href="{{ route('admin.confirm.transaction.edit', $confirm->id) }}" class="btn btn-danger">Rejected</a>
                        @else
                            <a href="{{ route('admin.confirm.transaction.edit', $confirm->id) }}" class="btn btn-success">Accept</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
</div>
@endsection
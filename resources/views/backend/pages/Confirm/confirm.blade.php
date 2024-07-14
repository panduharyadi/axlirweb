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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <span class="badge bg-warning text-white"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
</div>
@endsection
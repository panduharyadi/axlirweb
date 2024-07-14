@extends('backend.Layouts')

@section('title', 'Citys')
    

@section('content')
<a href="{{ route('admin.city.create') }}" class="btn btn-primary mt-5">Add City</a>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>City Name</th>
                <th>Action</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($citys as $city)
                <tr>
                    <td>{{ $city->kota_name }}</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a> |
                        <a href="" class="btn btn-info">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
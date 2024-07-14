@extends('backend.Layouts')

@section('title', 'Provinces')
    

@section('content')
<a href="{{ route('admin.province.create') }}" class="btn btn-primary mt-5">Add Provinces</a>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Province Name</th>
                <th>Action</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($provinces as $province)
                <tr>
                    <td>{{ $province->province_name }}</td>
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
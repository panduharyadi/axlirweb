@extends('backend.Layouts')

@section('title', 'List Blogs')

@section('content')
<a href="{{ route('admin.blog.add') }}" class="btn btn-primary mt-5">Add New Blog</a>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td><img src="{{ asset($blog->image) }}" width="80" alt=""></td>
                    <td>{{ $blog->headline }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>
                        edit | delete
                    </td>
                </tr>    
            @endforeach
        </tbody>
    </table>
</div>
@endsection


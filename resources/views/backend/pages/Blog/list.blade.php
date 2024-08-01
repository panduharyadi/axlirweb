@extends('backend.Layouts')

@section('title', 'List Blogs')

@section('content')
<a href="{{ route('admin.blog.add') }}" class="btn btn-primary mt-5">Add New Blog</a>

<div class="card container mb-3 mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Tanggal Rilis</th>
                <th>Hapus</th>
            </tr>   
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td><img src="{{ asset($blog->image) }}" width="80" alt=""></td>
                    <td>{{ $blog->headline }}</td>
                    <td>{!! $blog->slug !!}</td>
                    <td>{{ date('d-M-y', strtotime($blog->created_at)) }}</td>
                    <td>
                        <form action="{{ route('admin.blog.delete', $blog->id) }}" method="post" class="mt-2">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger fw-semibold lh-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>    
            @endforeach
        </tbody>
    </table>
</div>
@endsection


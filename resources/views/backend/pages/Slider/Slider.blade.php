@extends('backend.Layouts')

@section('title', 'Slideshow')

@section('content')
    <a href="{{ route('admin.slider.add') }}" class="btn btn-primary mt-5">Add New Slider</a>

    <div class="card container mb-3 mt-4">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Preview</th>
                    <th>Judul</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>
                            <img src="{{ asset($slider->image) }}" alt="" srcset="" style="width: 70px;">
                        </td>
                        <td>{{ $slider->headline }}</td>
                        <td>
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-warning">Edit</a> |
                            <form action="{{ route('admin.slider.delete', $slider->id) }}" method="post">
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
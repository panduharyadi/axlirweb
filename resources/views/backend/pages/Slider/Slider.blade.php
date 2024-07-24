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
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-warning fs-2 fw-semibold lh-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>  |
                            <form action="{{ route('admin.slider.delete', $slider->id) }}" method="post" id="deleteForm_{{ $slider->id }}" class="mt-2">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger fw-semibold lh-sm" onclick="confirmDelete({{ $slider->id }})">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire('Sukses!', '{{ session('success') }}', 'success');
    </script>
@endif

<script>
    function confirmDelete(sliderId) {
            // Tampilkan SweetAlert konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user mengklik 'Ya', submit form delete
                    document.getElementById('deleteForm_' + sliderId).submit();
                }
            });
        }
</script>

@endsection
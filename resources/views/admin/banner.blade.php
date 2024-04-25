@extends('layouts.adminLayout')

@section('content')
    <div class="col-lg-12">


        <!-- Banners List -->
        <div class="mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Existing Banners</h5>
                <a href="{{ url('banner/create') }}" class="btn btn-success">Add New Banner</a>
            </div>
            <!-- Display existing banners with edit and delete buttons -->
            @if (session('delete'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- Example: -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $banners->firstItem() + $loop->index }}</td>
                                <td><img src="{{ asset('Images/banner/' . $banner->image_path) }}" alt="Banner 1"
                                        width="100"></td>
                                <td>{{ $banner->link }}</td>
                                <td>
                                    <a href="{{ url('banner/edit/' . $banner->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('banner/delete/' . $banner->id) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more rows for additional banners -->
                    </tbody>
                </table>
            </div>
            {{ $banners->links() }}
        </div>

    </div>
    </div>
    </div>
@endsection

@extends('layouts.adminLayout')

@section('content')
    <div class="mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Existing Places</h5>
            <a href="{{ url('place/create') }}" class="btn btn-success">Add New Place</a>
        </div>
        <!-- Display existing places with edit and delete buttons -->
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
                        <th>Heading</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($places as $place)
                        <tr>
                            <td>{{ $places->firstItem() + $loop->index }}</td>
                            <td><img src="{{ asset('Images/place/' . $place->place_image) }}" alt="Place 1" width="100">
                            </td>
                            <td>{{ $place->place_heading }}</td>
                            <td>{{ $place->place_link }}</td>
                            <td>
                                <a href="{{ url('place/edit/' . $place->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('place/delete/' . $place->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Add more rows for additional places -->
                </tbody>
            </table>
        </div>
        {{ $places->links() }}
    </div>

    {{-- <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Places</h5>
        </div>
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card-body">
            <form action="{{route('place.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="place_image" class="form-label">Place Image</label>
                    <input type="file" class="form-control" id="place_image" name="place_image">
                </div>
                <div class="mb-3">
                    <label for="place_heading" class="form-label">Place Heading</label>
                    <input type="text" class="form-control" id="place_heading" name="place_heading">
                </div>
                <div class="mb-3">
                    <label for="place_link" class="form-label">Place Link</label>
                    <input type="text" class="form-control" id="place_link" name="place_link">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add Place</button>
                </div>
            </form>

            <!-- Banners List -->
            
           
        </div>
    </div>
</div> --}}
@endsection

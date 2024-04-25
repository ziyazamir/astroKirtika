@extends('layouts.adminLayout')

@section('content')
   
    <div class="col-lg-12">
    
       
        <!-- Banners List -->
        <div class="mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Existing Chambers</h5>
                <a href="{{ url('chamber/create') }}" class="btn btn-success">Add New Chamber</a>
            </div>
            <!-- Display existing banners with edit and delete buttons -->
            @if(session('delete'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ session('delete') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <!-- Example: -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Chamber Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chambers as $chamber)
                        <tr>
                            <td>{{ $chambers->firstItem() + $loop->index }}</td>
                            <td>{{ $chamber->name }}</td>
                            <td>{{ $chamber->description }}</td>
                            <td>
                                <a href="{{ url('chamber/edit/' . $chamber->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('chamber/delete/' . $chamber->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Add more rows for additional banners -->
                    </tbody>
                </table>
            </div>
            {{ $chambers->links() }}
        </div>
        
    </div>
</div>
</div>
@endsection

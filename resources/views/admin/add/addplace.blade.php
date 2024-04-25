@extends('layouts.adminLayout')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Places</h5>
        </div>
        @if(session('success'))
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
</div>

@endsection
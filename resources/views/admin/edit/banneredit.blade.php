@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Place</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/banner/update/' . $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Banner Image -->
                            <div class="mb-3">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <input type="file" class="form-control @error('banner_image') is-invalid @enderror"
                                    id="banner_image" name="banner_image" value="{{ $banner->image_path }}">
                                @error('banner_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Banner Link -->
                            <div class="mb-3">
                                <label for="banner_link" class="form-label">Banner Link</label>
                                <input type="text" class="form-control @error('banner_link') is-invalid @enderror"
                                    id="banner_link" name="banner_link" value="{{ $banner->link }}">
                                @error('banner_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Banner</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

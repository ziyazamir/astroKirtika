@extends('layouts.adminLayout')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add New Banners</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Banner Image -->
                    <div class="mb-3">
                        <label for="banner_image" class="form-label">Banner Image</label>
                        <input type="file" class="form-control @error('banner_image') is-invalid @enderror"
                            id="banner_image" name="banner_image">
                        @error('banner_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Banner Link -->
                    <div class="mb-3">
                        <label for="banner_link" class="form-label">Banner Link</label>
                        <input type="text" class="form-control @error('banner_link') is-invalid @enderror"
                            id="banner_link" name="banner_link" value="{{ old('banner_link') }}">
                        @error('banner_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Banner</button>
                </form>

                <!-- Banners List -->


            </div>
        </div>
    </div>
@endsection

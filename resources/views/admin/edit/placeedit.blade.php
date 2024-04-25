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
                        <form action="{{ url('/place/update/' . $place->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="place_image" class="form-label">Place Image</label>
                                <input type="file" class="form-control" id="place_image" name="place_image"
                                    value="{{ $place->place_image }}">
                            </div>
                            <div class="mb-3">
                                <label for="place_heading" class="form-label">Place Heading</label>
                                <input type="text" class="form-control" id="place_heading" name="place_heading"
                                    value="{{ $place->place_heading }}">
                            </div>
                            <div class="mb-3">
                                <label for="place_link" class="form-label">Place Link</label>
                                <input type="text" class="form-control" id="place_link" name="place_link"
                                    value="{{ $place->place_link }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Place</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

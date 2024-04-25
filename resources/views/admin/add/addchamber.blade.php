@extends('layouts.adminLayout')

@section('content')
    <div class="mt-4">
        <h5>Add Chamber Name</h5>
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('chamber.store') }}">
            @csrf
            <div class="mb-3">
                <label for="chamber_name" class="form-label">Chamber Name</label>
                <input type="text" class="form-control" id="chamber_name" name="name"
                    placeholder="Enter chamber name">
                @error('chamber_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Chamber Name</label>
                <textarea type="text" class="form-control" id="description" name="description"
                    placeholder="Description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
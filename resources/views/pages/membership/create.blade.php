@extends('layouts.adminLayout')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add New Membership</h5>
        </div>
        @if(session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card-body">
            <form action="{{route('membership.store')}}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="place_heading" class="form-label">Title</label>
                    <input required type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input required type="number" class="form-control" id="price" name="price">
                </div>
                <div class="mb-3">
                    <label for="validity" class="form-label">Validity in Days</label>
                    <input required type="number" class="form-control" id="validity" name="validity">
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <input required height="300px" type="text" class="form-control" id="description" name="description">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add Membership</button>
                </div>
            </form>

            <!-- Banners List -->
            
           
        </div>
    </div>
</div>

@endsection
<!-- resources/views/admin/top_astrologer_selection.blade.php -->

@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Top 50 Astrologers Selection</h2>
        <form method="POST" action="{{ route('admin.offers.store') }}">
            @csrf
            <div class="form-group">
                <label for="from_date">From Date:</label>
                <input type="date" class="form-control" id="from_date" name="from_date" required>
            </div>
            <div class="form-group">
                <label for="to_date">To Date:</label>
                <input type="date" class="form-control" id="to_date" name="to_date" required>
            </div>
            <div class="form-group">
                <label for="selected_astrologers">Create special offers:</label>
                <select class="form-control" id="selected_astrologers" name="astrologer_id" required>
                    <!-- Populate this select box with astrologers -->
                    @foreach ($astrologers as $astrologer)
                        <option value="{{ $astrologer->id }}">{{ $astrologer->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

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
        <form method="POST" action="{{ url('/topastro/update/' . $TopAstrologerSelection->id) }}">
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
                <label for="selected_astrologers">Select Astrologers (up to 50):</label>
                <select multiple class="form-control" id="selected_astrologers" name="selected_astrologers[]" required>
                    <!-- Populate this select box with astrologers -->
                    @foreach ($astrologers as $astrologer)
                        <option value="{{ $astrologer->id }}">{{ $astrologer->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection

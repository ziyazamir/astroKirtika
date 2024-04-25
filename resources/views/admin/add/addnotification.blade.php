<!-- resources/views/admin/notification.blade.php -->

@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Send Notification</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.sendNotification') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Notification Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Notification Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">

                                <label for="astrologers" class="form-label">Send to Astrologers</label>
                                <select class="form-select" id="astrologers" name="type">
                                    <option value="user">User</option>
                                    <option value="Astrologer">Astrologer</option>
                                </select>
                            </div>
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="send_to_all" name="send_to_all">
                                <label class="form-check-label" for="send_to_all">Send to All Astrologers</label>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

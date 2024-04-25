@extends('layouts.adminLayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                @section('content')
                    {{-- <div class="card"> --}}
                    {{-- <div class="card-header">
                            <h3 class="card-title">Recently Added Astrologers</h3>
                        </div> --}}
                    <!-- /.card-header -->
                    <section style="background-color: #eee;">
                        <div class="container py-5">
                            {{-- <div class="row">
                                    <div class="col">
                                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div> --}}

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                            <img src="{{ url('/images/astroProfile/' . $astrologer->profile_image) }}"
                                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                            <h5 class="my-3">{{ $astrologer->name }}</h5>
                                            <p class="text-muted mb-1">{{ $astrologer->country }}</p>
                                            {{-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary">{{ $astrologer->status == 'active' ? 'Active' : 'Inactive' }}</button>
                                                {{-- <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-outline-primary ms-1">Message</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4 mb-lg-0">
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush rounded-3">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <span>Designation:</span>
                                                    <p class="mb-0">{{ $astrologer->designation }}</p>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <span>Fees:</span>
                                                    <p class="mb-0">{{ $astrologer->fees }}</p>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <span>Total Experience</span>
                                                    <p class="mb-0">{{ $astrologer->total_experience }}</p>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <span>Languages</span>
                                                    <p class="mb-0">{{ $astrologer->languages }}</p>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <span>Vast Visit</span>
                                                    <p class="mb-0">{{ $astrologer->visit }}</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ $astrologer->name }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">{{ $astrologer->email }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">
                                                        {{ $astrologer->phone_code . ' ' . $astrologer->number }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Phone 2</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">
                                                        {{ $astrologer->phone_code . ' ' . $astrologer->phone2 }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            {{-- <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Country</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"> {{ $astrologer->country }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Designation</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"> {{ $astrologer->designation }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Languages</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"> {{ $astrologer->languages }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Total experience</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"> {{ $astrologer->total_experience }}</p>
                                                </div>
                                            </div>
                                            <hr> --}}
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">WhatsApp Number</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"> {{ $astrologer->w_number }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card mb-4 mb-md-0">
                                                <div class="card-body">
                                                    <p class="mb-4"><span class="text-primary font-italic me-1">Membership
                                                            Details</span>

                                                    </p>
                                                    <p class="mb-1" style="font-size: .77rem;">Title</p>
                                                    <div class="progress rounded" style="height: auto;padding:5px">
                                                        <h5>{{ $astrologer->title }}</h5>
                                                    </div>
                                                    <p class="mb-1" style="font-size: .77rem;">Price</p>
                                                    <div class="progress rounded" style="height: auto;padding:5px">
                                                        <h5>{{ $astrologer->price }}</h5>
                                                    </div>
                                                    <p class="mb-1" style="font-size: .77rem;">validity in days</p>
                                                    <div class="progress rounded" style="height: auto;padding:5px">
                                                        <h5>{{ $astrologer->validity }}</h5>
                                                    </div>
                                                    <p class="mb-1" style="font-size: .77rem;">Description</p>
                                                    <div class="progress rounded" style="height: auto;padding:5px">
                                                        <h5>{{ $astrologer->description }}</h5>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card mb-4 mb-md-0">
                                                <div class="card-body">
                                                    <p class="mb-4"><span class="text-primary font-italic me-1">Intro
                                                            Video</span>

                                                    </p>
                                                    <video class="w-100" controls>
                                                        <source
                                                            src="{{ url('videos/astroIntroVideo/' . $astrologer->intro_video) }}"
                                                            type="video/mp4" />
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /.card-body -->
                    {{-- </div> --}}
                @endsection
            </div>
        </div>
    </div>
</div>

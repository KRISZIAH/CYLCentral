@extends('layouts.main')

@section('content')
<div class="container announcement_container ">
    <h2 class="mb-4">Announcements</h2>


    <div class="row">
        @foreach ($announcements as $announcement)
            <div class="col-md-4 mb-4">
                <div class="card border-success shadow-sm" data-bs-toggle="modal" data-bs-target="#announcementModal{{ $announcement->id }}">
                    <div class="card-body">
                    <img src="{{ asset('img/Announcement_users/announcement1.png') }}" alt="Success" class="announcement-icon" style="width: 40px; height: 40px; margin-bottom: 8px;">                        <h5 class="card-title text-success">{{ $announcement->title }}</h5>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($announcement->message, 100, '...') }}
                        </p>
                        <small class="text-secondary">
                            {{ \Carbon\Carbon::parse($announcement->date)->format('F d, Y | g:i A') }}
                        </small>
                    </div>
                </div>
            </div>


            <!-- Modal/ Pop Up -->
            <div class="modal fade" id="announcementModal{{ $announcement->id }}" tabindex="-1" aria-labelledby="announcementModalLabel{{ $announcement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-white">
                            <h5 class="modal-title" id="announcementModalLabel{{ $announcement->id }}">{{ $announcement->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $announcement->message }}</p>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('editprofile') }}" class="text-danger">Go to My Profile</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach
    </div>
</div>
@endsection

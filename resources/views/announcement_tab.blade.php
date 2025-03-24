@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Announcements</h2>

    <div class="row">
        @foreach ($announcements as $announcement)
            <div class="col-md-4 mb-4">
                <div class="card border-success shadow-sm" data-bs-toggle="modal" data-bs-target="#announcementModal{{ $announcement->id }}">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold">{{ $announcement->title }}</h5>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($announcement->message, 100, '...') }}
                        </p>
                        <small class="text-secondary">
                            📅 {{ \Carbon\Carbon::parse($announcement->date)->format('F d, Y') }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="announcementModal{{ $announcement->id }}" tabindex="-1" aria-labelledby="announcementModalLabel{{ $announcement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-white">
                            <h5 class="modal-title" id="announcementModalLabel{{ $announcement->id }}">{{ $announcement->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $announcement->message }}</p>
                            <small class="text-muted">📅 {{ \Carbon\Carbon::parse($announcement->date)->format('F d, Y') }}</small>
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

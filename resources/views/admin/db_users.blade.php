@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Users'])


<div class="card shadow">
    <div class="card-body">
        <!-- Toolbar Section -->
        <div class="row align-items-center mb-3 p-4">
            <!-- Buttons: Tabs -->
            <div class="col-md-6 mb-2 mb-md-0">
                <div class="btn-group w-100" role="group" aria-label="User Tabs">
                    <button type="button" class="btn1 w-50 active" id="usersBtn">Users</button>
                    <button type="button" class="btn1 w-50" id="pendingBtn">Pending Member Applicants</button>
                </div>
            </div>

            <!-- Buttons: Actions -->
            <div class="col-md-6 d-flex justify-content-md-end justify-content-start">
                <button type="button" class="extbtn me-2">
                    <i class="bi bi-file-earmark-excel"></i> Export to Excel
                </button>
                <button type="button" class="addbtn">
                    <i class="bi bi-plus-circle"></i> Add New User
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? 'N/A' }}</td>
                        <td>{{ $user->created_at->format('m-d-Y') }}</td>
                        <td>
                            <span class="badge 
                                @if($user->role === 'Admin') bg-danger
                                @elseif($user->role === 'Director') bg-primary
                                @else bg-secondary @endif">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>
@endsection

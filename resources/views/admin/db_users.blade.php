@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Users'])
<div class="container-fluid programs-section py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex align-items-center mb-3 justify-content-between">
                <style>
                    .user-tab-group {
                        width: 400px;
                        height: 46px;
                        border-radius: 10px;
                        overflow: hidden;
                    }
                    .user-tab-btn {
                        height: 46px;
                        font-size: 16px;
                        font-weight: 400;
                        padding: 0 34px;
                        border: none;
                        box-sizing: border-box;
                        background: #eaf6f2;
                        color: #0b3d2d;
                        border-radius: 0;
                        transition: background 0.2s, color 0.2s, font-weight 0.2s;
                        text-decoration: none;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-left: -2px;
                    }
                    .user-tab-btn:first-child {
                        margin-left: 0;
                    }
                    .user-tab-btn.active, .user-tab-btn:active {
                        background: #0b3d2d !important;
                        color: #fff !important;
                        font-weight: 700;
                        z-index: 2;
                        border: 2px solid #0b3d2d;
                        position: relative;
                        height: 46px;
                        box-sizing: border-box;
                        padding-top: 0;
                        padding-bottom: 0;
                        margin-top: 0;
                        margin-bottom: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                    }
                    .user-tab-btn:first-child {
                        border-radius: 10px 0 0 10px;
                    }
                    .user-tab-btn:last-child {
                        border-radius: 0 10px 10px 0;
                    }
                    .user-tab-btn:not(:first-child):not(:last-child) {
                        border-radius: 0;
                    }
                    .addbtn {
                        background: var(--gradient-brown);
                        color: #fff;
                        border-radius: 8px;
                        font-size: 16px;
                        font-weight: 500;
                        border: none;
                        padding: 10px 18px;
                        transition: background 0.2s, color 0.2s;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .addbtn:hover, .addbtn:focus {
                        opacity: 0.92;
                    }
                    .extbtn {
                        background: transparent;
                        color: #c26b5a;
                        border: 1px solid #c26b5a;
                        border-radius: 8px;
                        font-size: 16px;
                        font-weight: 500;
                        padding: 10px 18px;
                        transition: background 0.2s, color 0.2s;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .extbtn:hover, .extbtn:focus {
                        background: var(--gradient-brown);
                        color: #fff;
                        border-color: #a04e37;
                    }
                    .search-bar-container {
                        background: rgba(var(--green1-rgb, 0, 128, 96), 1);
                        border-radius: 12px;
                        width: 216px;
                        height: 35px;
                    }
                    .search-bar-input::placeholder {
                        color: white;
                        opacity: 1;
                    }
                    .search-bar-input {
                        background: transparent;
                        border: none;
                        outline: none;
                        color: white;
                        font-size: 15px;
                        width: 170px;
                        height: 100%;
                        min-height: 0;
                    }
                    .role-member { 
                        color: #00A825; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .role-program { 
                        color: #5C0EA5; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .role-admin, .role-executive { 
                        color: #E00000; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .role-participant { 
                        color: #E2AE02; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .profile-link {
                        color: #c26b5a;
                        text-decoration: none;
                        font-weight: 500;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .profile-link:hover {
                        color: #a04e37;
                        text-decoration: underline;
                    }
                    .action-icon {
                        color: var(--green1);
                        font-size: 18px;
                        cursor: pointer;
                        margin: 0 5px;
                    }
                    .action-icon.delete {
                        color: #E00000;
                    }
                    /* Table styling */
                    .table {
                        border-bottom: none !important;
                        margin-bottom: 0 !important;
                    }
                    .table>:not(caption)>*>* {
                        border-bottom-width: 0;
                        text-align: center;
                        vertical-align: middle;
                        padding: 12px;
                    }
                    .table>tbody {
                        border-bottom: none !important;
                    }
                    .table th {
                        color: #0b3d2d;
                        font-weight: 600;
                        padding: 14px 12px;
                        text-align: center;
                    }
                    .table td {
                        border-right: 1px solid rgba(0,61,43,0.15);
                    }
                    .table th {
                        border-right: 1px solid rgba(0,61,43,0.15);
                    }
                    .table td:last-child, .table th:last-child {
                        border-right: none;
                    }
                    .gradient-green-text {
                        background: var(--gradient-green);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                        color: transparent;
                        text-align: center;
                        font-weight: 600;
                    }
                    .table tbody tr {
                        border-bottom: 1px solid rgba(0,61,43,0.1);
                    }
                    .table tbody tr:last-child {
                        border-bottom: none;
                    }
                    /* Column widths */
                    .col-select { width: 50px; }
                    .col-user-id { width: 80px; }
                    .col-profile { width: 100px; }
                    .col-name { width: 120px; }
                    .col-email { width: 180px; }
                    .col-contact { width: 150px; }
                    .col-date { width: 120px; }
                    .col-role { width: 100px; }
                    .col-action { width: 100px; }
                    /* Custom Pagination Styling */
                    .pagination-container {
                        margin-top: 1rem;
                    }
                    .custom-pagination {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    }
                    .pagination-arrow {
                        color: var(--green1);
                        font-size: 18px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        text-decoration: none;
                    }
                    .pagination-arrow i {
                        font-weight: bold;
                        font-size: 22px;
                    }
                    .pagination-arrow.opacity-50 {
                        opacity: 0.5;
                    }
                    .pagination-number {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 30px;
                        height: 30px;
                        border-radius: 8px;
                        color: var(--green1);
                        text-decoration: none;
                        font-weight: 500;
                    }
                    .pagination-number.active {
                        background-color: var(--green1);
                        color: white;
                    }
                    /* Custom checkbox styling */
                    input[type="checkbox"] {
                      appearance: none;
                      -webkit-appearance: none;
                      width: 18px;
                      height: 18px;
                      border: 2px solid rgba(0, 61, 43, 0.4);
                      border-radius: 4px;
                      margin: 0;
                      cursor: pointer;
                      position: relative;
                      transition: all 0.2s ease;
                      background-color: white;
                    }
                    input[type="checkbox"]:checked {
                      background-color: var(--green1);
                      border-color: var(--green1);
                    }
                    input[type="checkbox"]:checked::after {
                      content: '✓';
                      position: absolute;
                      color: white;
                      font-size: 14px;
                      top: 50%;
                      left: 50%;
                      transform: translate(-50%, -50%);
                      line-height: 1;
                    }
                    input[type="checkbox"]:focus {
                      outline: none;
                      box-shadow: 0 0 0 2px rgba(0, 128, 96, 0.25);
                    }
                    /* Custom Scrollbar Styling */
                    ::-webkit-scrollbar {
                        height: 6px;
                        background: transparent;
                    }
                    ::-webkit-scrollbar-thumb {
                        background: var(--gradient-green);
                        border-radius: 6px;
                    }
                    ::-webkit-scrollbar-track {
                        background: transparent;
                    }
                </style>
                <div class="d-flex align-items-center" style="gap: 0.5rem;">
                    <div class="btn-group user-tab-group align-items-center" role="group" aria-label="User Tabs">
                        <button type="button" class="btn user-tab-btn active">Users</button>
                        <a href="{{ route('db_membership') }}" class="btn user-tab-btn">Pending Member Applicants</a>
                    </div>
                </div>
                <div class="d-flex align-items-center" style="gap: 0.4rem;">
                    <button type="button" class="extbtn me-2"><i class="bi bi-download me-2"></i>Export Users</button>
                    <button type="button" class="addbtn" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-plus-lg me-2"></i>Add User</button>
                </div>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">User List</span>
                    <div class="search-bar-container d-flex align-items-center">
                        <i class="bi bi-search ms-2" style="color: white; font-size: 18px;"></i>
                        <input type="text" class="search-bar-input ms-2" placeholder="Search" style="padding-left: 8px; padding-right: 8px;">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="users-table">
                        <thead>
                            <tr>
                                <th scope="col" class="gradient-green-text col-select"><input type="checkbox" id="select-all"></th>
                                <th scope="col" class="gradient-green-text col-user-id">User ID</th>
                                <th scope="col" class="gradient-green-text col-profile">Profile</th>
                                <th scope="col" class="gradient-green-text col-name">First Name</th>
                                <th scope="col" class="gradient-green-text col-name">Last Name</th>
                                <th scope="col" class="gradient-green-text col-email">Email</th>
                                <th scope="col" class="gradient-green-text col-password">Password</th>
                                <th scope="col" class="gradient-green-text col-contact">Contact Number</th>
                                <th scope="col" class="gradient-green-text col-date">Date Created</th>
                                <th scope="col" class="gradient-green-text col-role">Role</th>
                                <th scope="col" class="gradient-green-text col-action">Action</th>
                            </tr>
                            <tr>
                                <th colspan="11" style="padding: 0; height: 2px; background: var(--gradient-green); border: none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox" class="row-check"></td>
                                <td>{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td><img src="{{ $user->profile_photo_url ?? asset('img/placeholder-profile.jpg') }}" alt="User Profile" class="rounded-circle" width="40" height="40"></td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>********</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->created_at->format('m-d-Y')}}</td>
                                <td style="font-weight: 600; text-align: center; color: 
                                    @php
                                    $roleText = strtolower($user->role);
                                    if (strpos($roleText, 'member') !== false) {
                                        echo '#00A825';
                                    } elseif (strpos($roleText, 'program') !== false || strpos($roleText, 'director') !== false) {
                                        echo '#5C0EA5';
                                    } elseif (strpos($roleText, 'admin') !== false || strpos($roleText, 'executive') !== false) {
                                        echo '#E00000';
                                    } elseif (strpos($roleText, 'participant') !== false) {
                                        echo '#E2AE02';
                                    } else {
                                        echo '#000000';
                                    }
                                    @endphp
                                ">{{$user->role}}</td>
                                <td>
                                    <a href="#" class="me-2 action-icon brown-icon" data-bs-toggle="modal" data-bs-target="#editUserModal{{$user->id}}"><i class="bi bi-pen-fill"></i></a>

                                    <!-- Edit User Modal -->
                                    <div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel{{$user->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <form method="post" action="{{ route('updateUser', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: var(--gradient-green); color: white;">
                                            <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="mb-3">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter new password (leave empty to keep current)">
                                                <small class="text-muted">Leave blank to keep current password</small>
                                            </div>
                                            <div class="mb-3">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="Participant" {{ $user->role == 'Participant' ? 'selected' : '' }}>Participant</option>
                                                    <option value="Member" {{ $user->role == 'Member' ? 'selected' : '' }}>Member</option>
                                                    <option value="Director" {{ $user->role == 'Director' ? 'selected' : '' }}>Director</option>
                                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>

                                    <!-- Delete User Button -->
                                    <a href="#" class="action-icon delete brown-icon" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{$user->id}}"><i class="bi bi-trash-fill"></i></a>
                                    
                                    <!-- Delete User Modal -->
                                    <div class="modal fade" id="deleteUserModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{$user->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background: #E00000; color: white;">
                                                    <h5 class="modal-title" id="deleteUserModalLabel{{$user->id}}">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete <strong>{{$user->first_name}} {{$user->last_name}}</strong>? This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete User</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
            <div class="pagination-container mt-3 mb-4 d-flex justify-content-end me-2">
                <div class="custom-pagination d-flex align-items-center">
                    <a href="#" class="pagination-arrow prev opacity-50" data-page="prev" aria-label="Previous page">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                    <a href="#" class="pagination-number active" data-page="1">1</a>
                    <a href="#" class="pagination-number" data-page="2">2</a>
                    <a href="#" class="pagination-arrow next" data-page="next" aria-label="Next page">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('storeUser') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header" style="background: var(--gradient-green); color: white;">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="Participant">Participant</option>
                            <option value="Member">Member</option>
                            <option value="Director">Director</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create User</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Success Message Toast -->
@if(session('success'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="background-color: #4CAF50; color: white;">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
<script>
    // Auto hide toast after 5 seconds
    setTimeout(function() {
        var toast = document.getElementById('successToast');
        var bsToast = new bootstrap.Toast(toast);
        bsToast.hide();
    }, 5000);
</script>
@endif

@push('scripts')
<script>
    // Select All Checkbox Logic
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.getElementById('select-all');
        const rowChecks = document.querySelectorAll('.row-check');

        function updateSelectAll() {
            const allChecked = Array.from(rowChecks).every(cb => cb.checked);
            selectAll.checked = allChecked;
        }

        selectAll.addEventListener('change', function() {
            rowChecks.forEach(cb => cb.checked = selectAll.checked);
        });
        
        rowChecks.forEach(cb => {
            cb.addEventListener('change', updateSelectAll);
        });
        
        // Pagination functionality
        const paginationLinks = document.querySelectorAll('.pagination-number, .pagination-arrow');
        const totalPages = 2; // Total number of pages available
        let currentPage = 1;
    
        
        // Update pagination UI based on current page
        function updatePagination() {
            // Update page numbers
            document.querySelectorAll('.pagination-number').forEach(link => {
                link.classList.remove('active');
                if (parseInt(link.getAttribute('data-page')) === currentPage) {
                    link.classList.add('active');
                }
            });
            
            // Update arrow states
            const prevArrow = document.querySelector('.pagination-arrow.prev');
            const nextArrow = document.querySelector('.pagination-arrow.next');
            
            // Previous arrow logic
            if (currentPage <= 1) {
                prevArrow.classList.add('opacity-50');
            } else {
                prevArrow.classList.remove('opacity-50');
            }
            
            // Next arrow logic
            if (currentPage >= totalPages) {
                nextArrow.classList.add('opacity-50');
            } else {
                nextArrow.classList.remove('opacity-50');
            }
            
            // Update table content with sample data
            updateTableContent();
        }
        
        // Update table content based on current page
        function updateTableContent() {
            const tbody = document.querySelector('#users-table tbody');
            const pageData = pages[currentPage] || [];
            
            // Clear existing rows
            tbody.innerHTML = '';
            
            // Add new rows for current page
            pageData.forEach(item => {
                const row = document.createElement('tr');
                let roleClass = '';
                
                // Set role class for styling
                if (item.role === 'Member') roleClass = 'role-member';
                else if (item.role === 'Director') roleClass = 'role-director';
                else if (item.role === 'Admin') roleClass = 'role-admin';
                else if (item.role === 'Participant') roleClass = 'role-participant';
                
                row.innerHTML = `
                    <td><input type="checkbox" class="row-check"></td>
                    <td>${item.id}</td>
                    <td><img src="{{ asset('img/placeholder-profile.jpg') }}" alt="User Profile" class="rounded-circle" width="40" height="40"></td>
                    <td>${item.firstName}</td>
                    <td>${item.lastName}</td>
                    <td>${item.email}</td>
                    <td>${item.contact}</td>
                    <td>${item.date}</td>
                    <td class="${roleClass}">${item.role}</td>
                    <td>
                        <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                        <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                    </td>
                `;
                tbody.appendChild(row);
            });
            
            // Select-all checkbox logic
            const selectAll = document.getElementById('select-all');
            const rowCheckboxes = tbody.querySelectorAll('.row-check');
            
            // Remove previous event listeners
            selectAll.onclick = null;
            rowCheckboxes.forEach(cb => cb.onclick = null);
            
            // Select-all handler
            selectAll.checked = false;
            selectAll.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => {
                    cb.checked = selectAll.checked;
                });
            });
            
            // Row checkbox handler
            rowCheckboxes.forEach(cb => {
                cb.addEventListener('change', function() {
                    const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
                    selectAll.checked = allChecked;
                });
            });
        }
        
        // Add click event listeners to pagination links
        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const pageAction = this.getAttribute('data-page');
                
                if (pageAction === 'prev' && currentPage > 1) {
                    currentPage--;
                } else if (pageAction === 'next' && currentPage < totalPages) {
                    currentPage++;
                } else if (pageAction !== 'prev' && pageAction !== 'next') {
                    currentPage = parseInt(pageAction);
                }
                
                updatePagination();
            });
        });
        
        // Initialize pagination
        updatePagination();
    });
</script>
@endpush
@endsection
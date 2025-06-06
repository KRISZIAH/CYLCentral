@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Programs'])
<div class="container-fluid programs-section py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex align-items-center mb-3">
                <span style="font-size:20px; font-weight:600; color: var(--green1);">Published Programs</span>
                <div class="ms-auto d-flex">
                    <a href="{{ route('programs.drafts') }}" class="me-3 px-4 py-2" style="background: transparent; color: var(--brown); border: 1.5px solid var(--brown); border-radius: 8px; font-size: 16px; font-weight: 500; text-decoration: none; display: inline-block;">Drafts</a>
                    <a href="{{ route('programs.create') }}" class="px-4 py-2" style="background: var(--gradient-brown); color: white; border-radius: 8px; font-size: 16px; font-weight: 500; border: none; text-decoration: none; display: inline-block;"><i class="bi bi-plus-circle me-2"></i>Add New</a>
                </div>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">Program List</span>
                    <div class="search-bar-container d-flex align-items-center" style="width: 216px; height: 35px; background: rgba(var(--green1-rgb, 0, 128, 96), 1); border-radius: 12px;">
    <i class="bi bi-search ms-2" style="color: white; font-size: 18px;"></i>
    <input type="text" class="search-bar-input ms-2" placeholder="Search" style="background: transparent; border: none; outline: none; color: white; font-size: 15px; width: 170px; height: 100%; min-height: 0; padding-left: 8px; padding-right: 8px;">
</div>
<style>
    .search-bar-container {
        background: rgba(var(--green1-rgb, 0, 128, 96), 1); /* fallback if --green1-rgb is not set */
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
</style>
                </div>
                <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                    <table class="table align-middle mb-0 program-table" style="border-radius: 0 0 12px 12px; overflow: hidden; width: 100%; border-bottom: none;">
                        <style>
                            .program-table th {
                                text-align: left;
                                vertical-align: middle;
                                padding: 14px 20px;
                                word-break: break-word;
                                background: #fff;
                                font-size: 16px;
                                font-weight: 600;
                                position: relative;
                            }
                            .gradient-green-text {
                                background: var(--gradient-green);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                background-clip: text;
                                color: transparent;
                            }
                            .program-table th:not(:last-child),
                            .program-table td:not(:last-child) {
                                border-right: 1px solid rgba(0,61,43,0.15);
                            }
                            /* Center-align all columns except Description (4th) */
                            .program-table th:not(:nth-child(4)),
                            .program-table td:not(:nth-child(4)) {
                                text-align: center;
                            }
                            /* Keep Description left-aligned */
                            .program-table th:nth-child(4),
                            .program-table td:nth-child(4) {
                                text-align: left;
                            }
                            .program-table thead tr:first-child th {
                                border-bottom: 2px solid var(--gradient-green);
                            }
                            .program-table tbody tr {
                                border-bottom: 1px solid rgba(0,61,43,0.1);
                            }
                            .program-table tbody tr:last-child {
                                border-bottom: none;
                            }
                            
                            /* Remove bottom border/grid */
                            .table {
                                border-bottom: none !important;
                                margin-bottom: 0 !important;
                            }
                            
                            /* Additional fixes for bottom grid */
                            .table>:not(caption)>*>* {
                                border-bottom-width: 0;
                            }
                            
                            .table>tbody {
                                border-bottom: none !important;
                            }
                            
                            /* Set max-width for logo column */
                            .program-table th:nth-child(2),
                            .program-table td:nth-child(2) {
                                max-width: 150px;
                                width: 150px;
                            }
                            
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
                        </style>
                        <thead>
                            <tr>
                                <th class="gradient-green-text">Program ID</th>
                                <th class="gradient-green-text">Logo</th>
                                <th class="gradient-green-text">Program Name</th>
                                <th class="gradient-green-text">Description</th>
                                <th class="gradient-green-text">Program Type</th>
                                <th class="gradient-green-text">Date Created</th>
                                <th class="gradient-green-text">Director</th>
                                <th class="gradient-green-text">Total Events</th>
                                <th class="gradient-green-text">Action</th>
                            </tr>
                            <tr>
                                <th colspan="9" style="padding: 0;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programs as $program)
                            <tr>
                                <td>{{ $program->formatted_id }}</td>
                                <td>
                                    @if($program->logo_path)
                                        <img src="{{ asset('storage/' . $program->logo_path) }}" alt="{{ $program->name }}" style="height:40px; max-width: 130px;">
                                    @else
                                        <div style="height:40px; width:40px; background-color:#eee; display:flex; align-items:center; justify-content:center; margin:0 auto;">No Logo</div>
                                    @endif
                                </td>
                                <td>{{ $program->name }}</td>
                                <td>{{ Str::limit($program->description, 150) }}</td>
                                <td>{{ $program->type }}</td>
                                <td>{{ $program->created_at->format('m-d-Y') }}</td>
                                <td>{{ $program->created_by ?? 'Admin' }}</td>
                                <td>{{ $program->participants_count }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                        <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this program?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">No programs found. <a href="{{ route('programs.create') }}">Create your first program</a>.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination-container mt-3 mb-4 d-flex justify-content-end me-2">
                {{ $programs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Apply gradient text to headers
        // Apply gradient text effect to table headers
        const headers = document.querySelectorAll('.program-table thead th.gradient-green-text');
        headers.forEach(header => {
            header.style.background = 'var(--gradient-green)';
            header.style.webkitBackgroundClip = 'text';
            header.style.webkitTextFillColor = 'transparent';
            header.style.backgroundClip = 'text';
        });
    });
</script>
@endpush
@endsection
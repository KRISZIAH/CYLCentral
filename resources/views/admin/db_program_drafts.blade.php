@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Programs'])
<div class="container-fluid programs-section py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex align-items-center mb-3">
                <span style="font-size:20px; font-weight:600; color: var(--green1);">Program Drafts</span>
                <div class="ms-auto d-flex">
                    <a href="{{ route('programs.index') }}" class="me-3 px-4 py-2" style="background: transparent; color: var(--brown); border: 1.5px solid var(--brown); border-radius: 8px; font-size: 16px; font-weight: 500; text-decoration: none; display: inline-block;">Published</a>
                    <a href="{{ route('programs.create') }}" class="px-4 py-2" style="background: var(--gradient-brown); color: white; border-radius: 8px; font-size: 16px; font-weight: 500; border: none; text-decoration: none; display: inline-block;"><i class="bi bi-plus-circle me-2"></i>Add New</a>
                </div>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">Draft Programs</span>
                    <div class="search-bar-container d-flex align-items-center" style="width: 216px; height: 35px; background: rgba(var(--green1-rgb, 0, 128, 96), 1); border-radius: 12px;">
                        <i class="bi bi-search ms-2" style="color: white; font-size: 18px;"></i>
                        <input type="text" class="search-bar-input ms-2" placeholder="Search" style="background: transparent; border: none; outline: none; color: white; font-size: 15px; width: 170px; height: 100%; min-height: 0; padding-left: 8px; padding-right: 8px;">
                    </div>
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
                            .program-table th:not(:nth-child(4)),
                            .program-table td:not(:nth-child(4)) {
                                text-align: center;
                            }
                            .program-table th:nth-child(4),
                            .program-table td:nth-child(4) {
                                text-align: left;
                            }
                            .program-table tr:not(:last-child) td {
                                border-bottom: 1px solid rgba(0,61,43,0.15);
                            }
                            .table>:not(caption)>*>* {
                                border-bottom-width: 0;
                            }
                            .table>tbody {
                                border-bottom: none !important;
                            }
                            .logo-column {
                                width: 130px;
                                max-width: 130px;
                            }
                            .pagination-container {
                                display: flex;
                                justify-content: center;
                                margin-top: 20px;
                                margin-bottom: 20px;
                            }
                            .pagination-arrow, .pagination-number {
                                width: 32px;
                                height: 32px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                text-decoration: none;
                            }
                            .pagination-arrow i {
                                font-weight: bold;
                                font-size: 22px;
                            }
                            .pagination-number {
                                background-color: rgba(0,61,43,0.1);
                                color: var(--green1);
                                border-radius: 5px;
                                margin: 0 5px;
                                font-weight: 600;
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
                                <th class="gradient-green-text">Created By</th>
                                <th class="gradient-green-text">Participants</th>
                                <th class="gradient-green-text">Actions</th>
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
                                        <form action="{{ route('programs.update', $program->id) }}" method="POST" class="d-inline ms-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="publish" value="1">
                                            <button type="submit" class="btn btn-sm btn-success" title="Publish"><i class="bi bi-check-circle-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">No draft programs found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination-container">
                    {{ $programs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

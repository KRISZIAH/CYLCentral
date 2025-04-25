@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Membership'])
<div class="container-fluid programs-section py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex align-items-center mb-3 justify-content-between">
                <div class="d-flex align-items-center" style="gap: 0.5rem;">
                    <div class="btn-group user-tab-group" role="group" aria-label="User Tabs" style="border-radius: 12px; overflow: hidden; border: 2px solid #0b3d2d;">
                        <a href="{{ route('db_users') }}" class="btn user-tab-btn" style="background: #eaf6f2; color: #0b3d2d; font-weight: 500; font-size: 17px; padding: 12px 34px; border: none; border-radius: 12px 0 0 12px; text-decoration: none;">Users</a>
                        <button type="button" class="btn user-tab-btn active" style="background: #0b3d2d; color: #fff; font-weight: 500; font-size: 17px; padding: 12px 34px; border: none; border-radius: 0 12px 12px 0;">Pending Member Applicants</button>
                    </div>
                </div>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white; min-height: 300px;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">Pending Member Applicants</span>
                </div>
                <div class="table-responsive" style="overflow-x: auto; min-width: 100%;">
                    <table class="table align-middle mb-0 program-table" style="border-radius: 0 0 12px 12px; overflow: hidden; width: 100%; border-bottom: none;">
                        <thead>
                            <tr>
                                <th class="gradient-green-text">Applicant ID</th>
                                <th class="gradient-green-text">Name</th>
                                <th class="gradient-green-text">Email</th>
                                <th class="gradient-green-text">Date Applied</th>
                                <th class="gradient-green-text">Status</th>
                                <th class="gradient-green-text">Action</th>
                            </tr>
                            <tr>
                                <th colspan="6" style="padding: 0; height: 2px; background: var(--gradient-green);"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example row -->
                            <tr>
                                <td>0001</td>
                                <td>Juan Dela Cruz</td>
                                <td>juan@email.com</td>
                                <td>04-25-2025</td>
                                <td><span style="color: #eb3d3d; font-weight: 600;">Pending</span></td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="#" class="action-icon me-2" title="Approve" style="color: var(--green1);"><i class="bi bi-check-circle"></i></a>
                                        <a href="#" class="action-icon" title="Reject" style="color: var(--brown);"><i class="bi bi-x-circle"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

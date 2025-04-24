@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Programs'])
<div class="container-fluid programs-section py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex align-items-center mb-3">
                <span style="font-size:20px; font-weight:600; color: var(--green1);">Create Program</span>
                <button class="ms-auto px-4 py-2" style="background: var(--gradient-brown); color: white; border-radius: 8px; font-size: 16px; font-weight: 500; border: none;">Add New</button>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">Program List</span>
                    <button class="d-flex align-items-center" style="background: transparent; border: none; color: white; border-radius: 8px; font-size: 15px; font-weight: 500;">
                        <i class="bi bi-funnel-fill me-2" style="color: white;"></i> Filter by
                    </button>
                </div>
                <div class="table-responsive" style="overflow-x: auto; min-width: 100%; padding: 20px;">
                    <table class="table align-middle mb-0" style="border-radius: 0 0 12px 12px; overflow: hidden;">
                        <thead style="background: #fff;">
                            <tr style="font-size: 16px; font-weight: 600; padding-top: 14px; padding-bottom: 14px;">
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Program ID</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Logo</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Program Name</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Description</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Program Type</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Date Created</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Director</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Total Events</th>
                                <th class="gradient-green-text" style="padding-left: 20px; padding-right: 20px;">Action</th>
                            </tr>
                            <tr>
                                <td colspan="9" style="padding: 0;">
                                    <div style="height:2px; background: var(--gradient-green); width:100%;"></div>
                                </td>
                            </tr>
                        </thead>
                        <style>
                            .gradient-green-text {
                                background: var(--gradient-green);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                background-clip: text;
                                color: transparent;
                                font-size: 16px !important;
                                font-weight: 600 !important;
                                padding-top: 14px !important;
                                padding-bottom: 14px !important;
                            }
                        </style>
                        <tbody>
                            <tr>
                                <td>P0001</td>
                                <td><img src="/img/programs/adal_kordilyera.png" alt="Adal Kordilyera" style="height:40px;"></td>
                                <td>Adal Kordilyera</td>
                                <td>Adal Kordilyera is digital information-sharing...</td>
                                <td>Skills Development Webinars</td>
                                <td>12-01-2024</td>
                                <td>Jessica Bilat</td>
                                <td>20</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>P0002</td>
                                <td><img src="/img/programs/kordi_arts.png" alt="Kordi Arts" style="height:40px;"></td>
                                <td>Kordi Arts</td>
                                <td>KordiArts is an art-based initiative that promotes...</td>
                                <td>Art Workshops</td>
                                <td>12-01-2024</td>
                                <td>Jessica Bilat</td>
                                <td>20</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>P0003</td>
                                <td><img src="/img/programs/sirib_leadership.png" alt="Sirib Leadership" style="height:40px;"></td>
                                <td>Sirib Leadership...</td>
                                <td>Sirib Leadership Essentials is a skills development...</td>
                                <td>Leadership Trainings</td>
                                <td>12-01-2024</td>
                                <td>Jessica Bilat</td>
                                <td>20</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>P0004</td>
                                <td><img src="/img/programs/project_hope.png" alt="Project H.O.P.E" style="height:40px;"></td>
                                <td>Project H.O.P.E</td>
                                <td>Project H.O.P.E is a series of initiatives that aim to raise...</td>
                                <td>Mental Health and Wellness</td>
                                <td>12-01-2024</td>
                                <td>Jessica Bilat</td>
                                <td>20</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>P0005</td>
                                <td><img src="/img/programs/project_dalluyon.png" alt="Project Dalluyon" style="height:40px;"></td>
                                <td>Project Dalluyon</td>
                                <td>Project Dalluyon is a program focused on addressing gen...</td>
                                <td>Mental Health and Wellness</td>
                                <td>12-01-2024</td>
                                <td>Jessica Bilat</td>
                                <td>20</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end align-items-center p-3">
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item active"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

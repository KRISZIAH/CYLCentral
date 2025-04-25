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
                        /* border removed for seamless tab effect */
                    }
                    .user-tab-btn {
                        height: 46px;
                        font-size: 16px;
                        font-weight: 400;
                        padding: 0 34px;
                        border: 2px solid #0b3d2d;
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
                        background: #f8f1ee;
                        color: #a04e37;
                        border-color: #a04e37;
                    }
                </style>
                <div class="d-flex align-items-center" style="gap: 0.5rem;">
                    <div class="btn-group user-tab-group align-items-center" role="group" aria-label="User Tabs">
                        <button type="button" class="btn user-tab-btn active">Users</button>
                        <a href="{{ route('db_membership') }}" class="btn user-tab-btn" style="border: 0px;">Pending Member Applicants</a>
                    </div>
                </div>
                <div class="d-flex align-items-center" style="gap: 0.4rem;">
                    <button type="button" class="extbtn me-2"><i class="bi bi-file-earmark-excel"></i> Export to Excel</button>
                    <button type="button" class="addbtn"><i class="bi bi-plus-circle me-2"></i>Add New User</button>
                </div>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">User Management</span>
                    <button class="d-flex align-items-center" style="background: transparent; border: none; color: white; border-radius: 8px; font-size: 15px; font-weight: 500;">
                        <i class="bi bi-funnel-fill me-2" style="color: white;"></i> Filter by
                    </button>
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
                                <th class="gradient-green-text">User ID</th>
                                <th class="gradient-green-text">Profile</th>
                                <th class="gradient-green-text">First Name</th>
                                <th class="gradient-green-text">Last Name</th>
                                <th class="gradient-green-text">Email</th>
                                <th class="gradient-green-text">Contact Number</th>
                                <th class="gradient-green-text">Date Created</th>
                                <th class="gradient-green-text">Role</th>
                                <th class="gradient-green-text">Action</th>
                            </tr>
                            <tr>
                                <th colspan="9" style="padding: 0;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0001</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Juan</td>
                                <td>Dela Cruz</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-01-2024</td>
                                <td>Member</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0002</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Maria</td>
                                <td>Santos</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-03-2024</td>
                                <td>Member</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0003</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Carlo</td>
                                <td>Reyes</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-05-2024</td>
                                <td>Director</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0004</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Andrea</td>
                                <td>Lopez</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-07-2024</td>
                                <td>Participant</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0005</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Jennifer</td>
                                <td>Moltio</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-08-2024</td>
                                <td>Admin</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0006</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Patricia</td>
                                <td>Gomez</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-10-2024</td>
                                <td>Member</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0007</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Richard</td>
                                <td>Tan</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>11-25-2024</td>
                                <td>Participant</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0008</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Tracy</td>
                                <td>Wal</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>11-23-2024</td>
                                <td>Participant</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0009</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Jaemil</td>
                                <td>Javier</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>11-23-2024</td>
                                <td>Member</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>0010</td>
                                <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                                <td>Jenny</td>
                                <td>Cruz</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>10-17-2024</td>
                                <td>Director</td>
                                <td>
                                    <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                                    <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Apply gradient text to headers
        const headers = document.querySelectorAll('.program-table thead th.gradient-green-text');
        headers.forEach(header => {
            header.style.background = 'var(--gradient-green)';
            header.style.webkitBackgroundClip = 'text';
            header.style.webkitTextFillColor = 'transparent';
            header.style.backgroundClip = 'text';
        });
        
        // Pagination functionality
        const paginationLinks = document.querySelectorAll('.pagination-number, .pagination-arrow');
        const totalPages = 4; // Total number of pages available
        let currentPage = 1;
        let visiblePages = 2; // Number of page numbers visible at once
        
        // Sample data for demonstration
        const pages = {
            1: [
                { id: '0001', firstName: 'Juan', lastName: 'Dela Cruz', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-01-2024', role: 'Member' },
                { id: '0002', firstName: 'Maria', lastName: 'Santos', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-03-2024', role: 'Member' },
                { id: '0003', firstName: 'Carlo', lastName: 'Reyes', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-05-2024', role: 'Director' },
                { id: '0004', firstName: 'Andrea', lastName: 'Lopez', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-07-2024', role: 'Participant' },
                { id: '0005', firstName: 'Jennifer', lastName: 'Moltio', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-08-2024', role: 'Admin' }
            ],
            2: [
                { id: '0006', firstName: 'Patricia', lastName: 'Gomez', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-10-2024', role: 'Member' },
                { id: '0007', firstName: 'Richard', lastName: 'Tan', email: 'juandc@gmail.com', contact: '+639123456789', date: '11-25-2024', role: 'Participant' },
                { id: '0008', firstName: 'Tracy', lastName: 'Wal', email: 'juandc@gmail.com', contact: '+639123456789', date: '11-23-2024', role: 'Participant' },
                { id: '0009', firstName: 'Jaemil', lastName: 'Javier', email: 'juandc@gmail.com', contact: '+639123456789', date: '11-23-2024', role: 'Member' },
                { id: '0010', firstName: 'Jenny', lastName: 'Cruz', email: 'juandc@gmail.com', contact: '+639123456789', date: '10-17-2024', role: 'Director' }
            ],
            3: [
                { id: '0011', firstName: 'David', lastName: 'Wong', email: 'juandc@gmail.com', contact: '+639123456789', date: '10-15-2024', role: 'Member' },
                { id: '0012', firstName: 'Sofia', lastName: 'Garcia', email: 'juandc@gmail.com', contact: '+639123456789', date: '10-12-2024', role: 'Participant' },
                { id: '0013', firstName: 'Miguel', lastName: 'Santos', email: 'juandc@gmail.com', contact: '+639123456789', date: '10-10-2024', role: 'Member' },
                { id: '0014', firstName: 'Isabella', lastName: 'Reyes', email: 'juandc@gmail.com', contact: '+639123456789', date: '10-05-2024', role: 'Participant' },
                { id: '0015', firstName: 'Antonio', lastName: 'Mendoza', email: 'juandc@gmail.com', contact: '+639123456789', date: '10-01-2024', role: 'Director' }
            ],
            4: [
                { id: '0016', firstName: 'Elena', lastName: 'Lim', email: 'juandc@gmail.com', contact: '+639123456789', date: '09-28-2024', role: 'Member' },
                { id: '0017', firstName: 'Rafael', lastName: 'Aquino', email: 'juandc@gmail.com', contact: '+639123456789', date: '09-20-2024', role: 'Member' },
                { id: '0018', firstName: 'Carmen', lastName: 'Torres', email: 'juandc@gmail.com', contact: '+639123456789', date: '09-15-2024', role: 'Participant' },
                { id: '0019', firstName: 'Francisco', lastName: 'Rivera', email: 'juandc@gmail.com', contact: '+639123456789', date: '09-10-2024', role: 'Admin' },
                { id: '0020', firstName: 'Gabriela', lastName: 'Bautista', email: 'juandc@gmail.com', contact: '+639123456789', date: '09-05-2024', role: 'Member' }
            ]
        };
        
        // Update pagination UI based on current page
        function updatePagination() {
            // Get pagination number elements
            const pageNumbers = document.querySelectorAll('.pagination-number');
            
            // Determine which page numbers to show
            let startPage = Math.max(1, Math.min(currentPage, totalPages - visiblePages + 1));
            
            // Update page numbers
            pageNumbers.forEach((link, index) => {
                const pageNum = startPage + index;
                link.textContent = pageNum;
                link.setAttribute('data-page', pageNum);
                link.classList.remove('active');
                
                if (pageNum === currentPage) {
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
            const tbody = document.querySelector('.program-table tbody');
            const pageData = pages[currentPage] || [];
            
            // Clear existing rows
            tbody.innerHTML = '';
            
            // Add new rows for current page
            pageData.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td><img src="/img/profiles/default.png" alt="User Profile" style="height:40px; max-width: none;"></td>
                    <td>${item.firstName}</td>
                    <td>${item.lastName}</td>
                    <td>${item.email}</td>
                    <td>${item.contact}</td>
                    <td>${item.date}</td>
                    <td>${item.role}</td>
                    <td>
                        <a href="#" class="me-2" style="color: var(--brown);"><i class="bi bi-pen-fill"></i></a>
                        <a href="#" style="color: var(--brown);"><i class="bi bi-trash-fill"></i></a>
                    </td>
                `;
                tbody.appendChild(row);
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
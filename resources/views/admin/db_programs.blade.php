@extends('layouts.adminside')

@section('content')
@include('admin.db_navbar', ['section' => 'Programs'])
<div class="container-fluid programs-section py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="d-flex align-items-center mb-3">
                <span style="font-size:20px; font-weight:600; color: var(--green1);">Create Program</span>
                <div class="ms-auto d-flex">
                    <a href="{{ route('db_draftprog') }}" class="me-3 px-4 py-2" style="background: transparent; color: var(--brown); border: 1.5px solid var(--brown); border-radius: 8px; font-size: 16px; font-weight: 500; text-decoration: none; display: inline-block;">Drafts</a>
                    <a href="{{ route('db_newprogram') }}" class="px-4 py-2" style="background: var(--gradient-brown); color: white; border-radius: 8px; font-size: 16px; font-weight: 500; border: none; text-decoration: none; display: inline-block;"><i class="bi bi-plus-circle me-2"></i>Add New</a>
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
                            <tr>
                                <td>P0001</td>
                                <td><img src="/img/programs/adal_kordilyera.png" alt="Adal Kordilyera" style="height:40px; max-width: none;"></td>
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
                                <td><img src="/img/programs/kordi_arts.png" alt="Kordi Arts" style="height:40px; max-width: none;"></td>
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
                            <!-- Additional rows can be added here -->
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
                { id: 'P0001', name: 'Adal Kordilyera', desc: 'Adal Kordilyera is digital information-sharing...', type: 'Skills Development Webinars' },
                { id: 'P0002', name: 'Kordi Arts', desc: 'KordiArts is an art-based initiative that promotes...', type: 'Art Workshops' }
            ],
            2: [
                { id: 'P0003', name: 'Siribs', desc: 'Siribs is a cultural preservation program...', type: 'Cultural Preservation' },
                { id: 'P0004', name: 'Hope Project', desc: 'Hope Project focuses on community development...', type: 'Community Development' }
            ],
            3: [
                { id: 'P0005', name: 'Dalluyon', desc: 'Dalluyon is an environmental awareness initiative...', type: 'Environmental Awareness' },
                { id: 'P0006', name: '10KOK', desc: '10KOK is a youth leadership program...', type: 'Youth Leadership' }
            ],
            4: [
                { id: 'P0007', name: 'Pansigedan', desc: 'Pansigedan focuses on indigenous knowledge...', type: 'Indigenous Knowledge' },
                { id: 'P0008', name: 'Sumya', desc: 'Sumya is a mental health awareness program...', type: 'Mental Health' }
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
                    <td><img src="/img/programs/${item.name.toLowerCase().replace(' ', '_')}.png" alt="${item.name}" style="height:40px; max-width: 130px;"></td>
                    <td>${item.name}</td>
                    <td>${item.desc}</td>
                    <td>${item.type}</td>
                    <td>12-01-2024</td>
                    <td>Jessica Bilat</td>
                    <td>20</td>
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
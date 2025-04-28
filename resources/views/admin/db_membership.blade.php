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
                    .status-paid { 
                        color: #00A825; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .status-unpaid { 
                        color: #E00000; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .status-approved { 
                        color: #00A825; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .status-pending { 
                        color: #E00000; 
                        font-weight: 600; 
                        text-align: center;
                    }
                    .verify-link {
                        color: #c26b5a;
                        text-decoration: none;
                        font-weight: 500;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                    .verify-link:hover {
                        color: #a04e37;
                        text-decoration: underline;
                    }
                    .id-check {
                        color: var(--green1);
                        font-size: 18px;
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
                    .col-reg-id { width: 120px; }
                    .col-name { width: 140px; }
                    .col-email { width: 180px; }
                    .col-contact { width: 150px; }
                    .col-date { width: 120px; }
                    .col-status { width: 130px; }
                    .col-id-card { width: 80px; }
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
                        <a href="{{ route('db_users') }}" class="btn user-tab-btn">Users</a>
                        <button type="button" class="btn user-tab-btn active">Pending Member Applicants</button>
                    </div>
                </div>
                <div class="d-flex align-items-center" style="gap: 0.4rem;">
                    <button type="button" class="extbtn me-2"><i class="bi bi-download me-2"></i>Download All IDs</button>
<button type="button" class="addbtn"><i class="bi bi-send-fill me-2"></i>Send ID</button>
                </div>
            </div>
            <div class="rounded shadow-sm p-0" style="background: white;">
                <div class="d-flex align-items-center justify-content-between px-4" style="background: var(--gradient-green); border-radius: 12px 12px 0 0; height:53px;">
                    <span style="font-size: 18px; font-weight: 600; color: white;">Membership Application List</span>
                    <div class="search-bar-container d-flex align-items-center">
                        <i class="bi bi-search ms-2" style="color: white; font-size: 18px;"></i>
                        <input type="text" class="search-bar-input ms-2" placeholder="Search" style="padding-left: 8px; padding-right: 8px;">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="applicants-table">
                        <thead>
    <tr>
        <th scope="col" class="gradient-green-text col-select"><input type="checkbox" id="select-all"></th>
        <th scope="col" class="gradient-green-text col-reg-id">Registration ID</th>
        <th scope="col" class="gradient-green-text col-name">First Name</th>
        <th scope="col" class="gradient-green-text col-name">Last Name</th>
        <th scope="col" class="gradient-green-text col-email">Email</th>
        <th scope="col" class="gradient-green-text col-contact">Contact Number</th>
        <th scope="col" class="gradient-green-text col-date">Date Applied</th>
        <th scope="col" class="gradient-green-text col-status">Payment Status</th>
        <th scope="col" class="gradient-green-text col-status">Application Status</th>
        <th scope="col" class="gradient-green-text col-id-card">ID Card</th>
        <th scope="col" class="gradient-green-text col-action">Action</th>
    </tr>
    <tr>
        <th colspan="11" style="padding: 0; height: 2px; background: var(--gradient-green); border: none;"></th>
    </tr>
</thead>

                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="row-check"></td>
                                <td>REG-001</td>
                                <td>Juan</td>
                                <td>Dela Cruz</td>
                                <td>juandc@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-01-2024</td>
                                <td class="status-paid">Paid</td>
                                <td class="status-approved">Approved</td>
                                <td class="text-center"><i class="bi bi-check-square-fill id-check"></i></td>
                                <td><a href="#" class="verify-link">Verify <i class="bi bi-arrow-right ms-1"></i></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="row-check"></td>
                                <td>REG-002</td>
                                <td>Maria</td>
                                <td>Santos</td>
                                <td>maria@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-03-2024</td>
                                <td class="status-unpaid">Unpaid</td>
                                <td class="status-pending">Pending</td>
                                <td class="text-center">-</td>
                                <td><a href="#" class="verify-link">Verify <i class="bi bi-arrow-right ms-1"></i></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="row-check"></td>
                                <td>REG-003</td>
                                <td>Carlo</td>
                                <td>Reyes</td>
                                <td>carlo@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-05-2024</td>
                                <td class="status-paid">Paid</td>
                                <td class="status-approved">Approved</td>
                                <td class="text-center"><i class="bi bi-check-square-fill id-check"></i></td>
                                <td><a href="#" class="verify-link">Verify <i class="bi bi-arrow-right ms-1"></i></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="row-check"></td>
                                <td>REG-004</td>
                                <td>Andrea</td>
                                <td>Lopez</td>
                                <td>andrea@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-07-2024</td>
                                <td class="status-unpaid">Unpaid</td>
                                <td class="status-pending">Pending</td>
                                <td class="text-center">-</td>
                                <td><a href="#" class="verify-link">Verify <i class="bi bi-arrow-right ms-1"></i></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="row-check"></td>
                                <td>REG-005</td>
                                <td>Jennifer</td>
                                <td>Moltio</td>
                                <td>jennifer@gmail.com</td>
                                <td>+639123456789</td>
                                <td>12-08-2024</td>
                                <td class="status-unpaid">Unpaid</td>
                                <td class="status-pending">Pending</td>
                                <td class="text-center">-</td>
                                <td><a href="#" class="verify-link">Verify <i class="bi bi-arrow-right ms-1"></i></a></td>
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
        
        // Sample data for demonstration - could be replaced with dynamic data
        const pages = {
            1: [
                { id: 'REG-001', firstName: 'Juan', lastName: 'Dela Cruz', email: 'juandc@gmail.com', contact: '+639123456789', date: '12-01-2024', payment: 'Paid', application: 'Approved', idCard: true },
                { id: 'REG-002', firstName: 'Maria', lastName: 'Santos', email: 'maria@gmail.com', contact: '+639123456789', date: '12-03-2024', payment: 'Unpaid', application: 'Pending', idCard: false },
                { id: 'REG-003', firstName: 'Carlo', lastName: 'Reyes', email: 'carlo@gmail.com', contact: '+639123456789', date: '12-05-2024', payment: 'Paid', application: 'Approved', idCard: true },
                { id: 'REG-004', firstName: 'Andrea', lastName: 'Lopez', email: 'andrea@gmail.com', contact: '+639123456789', date: '12-07-2024', payment: 'Unpaid', application: 'Pending', idCard: false },
                { id: 'REG-005', firstName: 'Jennifer', lastName: 'Moltio', email: 'jennifer@gmail.com', contact: '+639123456789', date: '12-08-2024', payment: 'Unpaid', application: 'Pending', idCard: false }
            ],
            2: [
                { id: 'REG-006', firstName: 'Patricia', lastName: 'Gomez', email: 'patricia@gmail.com', contact: '+639123456789', date: '12-10-2024', payment: 'Paid', application: 'Approved', idCard: true },
                { id: 'REG-007', firstName: 'Richard', lastName: 'Tan', email: 'richard@gmail.com', contact: '+639123456789', date: '11-25-2024', payment: 'Unpaid', application: 'Pending', idCard: false },
                { id: 'REG-008', firstName: 'Tracy', lastName: 'Wal', email: 'tracy@gmail.com', contact: '+639123456789', date: '11-23-2024', payment: 'Unpaid', application: 'Pending', idCard: false },
                { id: 'REG-009', firstName: 'Jaemil', lastName: 'Javier', email: 'jaemil@gmail.com', contact: '+639123456789', date: '11-23-2024', payment: 'Paid', application: 'Approved', idCard: true },
                { id: 'REG-010', firstName: 'Jenny', lastName: 'Cruz', email: 'jenny@gmail.com', contact: '+639123456789', date: '10-17-2024', payment: 'Paid', application: 'Approved', idCard: true }
            ]
        };
        
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
            const tbody = document.querySelector('#applicants-table tbody');
            const pageData = pages[currentPage] || [];
            
            // Clear existing rows
            tbody.innerHTML = '';
            
            // Add new rows for current page
            pageData.forEach(item => {
                const row = document.createElement('tr');
                const idCardContent = item.idCard ? 
                    '<i class="bi bi-image-fill id-check"></i>' : '-';
                
                row.innerHTML = `
                    <td><input type="checkbox" class="row-check"></td>
                    <td>${item.id}</td>
                    <td>${item.firstName}</td>
                    <td>${item.lastName}</td>
                    <td>${item.email}</td>
                    <td>${item.contact}</td>
                    <td>${item.date}</td>
                    <td class="status-dynamic">${item.payment}</td>
                    <td class="status-dynamic">${item.application}</td>
                    <td class="text-center">${idCardContent}</td>
                    <td><a href="#" class="verify-link">Verify <i class="bi bi-arrow-right ms-1"></i></a></td>
                `;
                tbody.appendChild(row);
            });
            // Dynamic coloring for Payment and Application Status
            tbody.querySelectorAll('td.status-dynamic').forEach(td => {
                const val = td.textContent.trim().toLowerCase();
                if (val === 'paid' || val === 'approved') {
                    td.style.color = '#00A825';
                    td.style.fontWeight = '600';
                } else if (val === 'pending' || val === 'unpaid') {
                    td.style.color = '#AE0000';
                    td.style.fontWeight = '600';
                }
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
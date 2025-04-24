@extends('layouts.adminside')
@section('styles')
<link rel="stylesheet" href="{{ asset('resources/css/admin-css/db_newprogram.css') }}">
@endsection
@section('content')
@include('admin.db_navbar', ['section' => 'Programs'])
<div class="container-fluid py-4" style="background: var(--mint); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-semibold" style="color: var(--green1); font-size: 20px; font-weight: 600;">New Program</h4>
                <div class="d-flex gap-2">
                    <button class="btn" style="border-radius:8px; background:transparent; border:1px solid var(--brown); color:var(--brown);">Save as Draft</button>
                    <button class="btn" style="border-radius:8px; background:var(--gradient-brown); color:#fff; padding-left:32px; padding-right:32px;">Publish</button>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card p-4" style="border-radius:16px;">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" for="programTitle" style="color: var(--green1); font-size: 16px; font-weight: 600;">Title</label>
                            <input type="text" class="form-control gradient-green-input" id="programTitle" placeholder="Program Name" style="background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; font-size:16px; font-weight:600; color: var(--green1);" />
<style>
.gradient-green-input::placeholder, .green1-opacity-input::placeholder {
    color: rgba(0,61,43,0.5) !important; /* var(--green1) at 50% opacity */
    opacity: 1;
    font-size: 16px;
    font-weight: 600;
}
</style>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-5 d-flex flex-column justify-content-start">
                                <label class="form-label fw-semibold mb-1" for="programLogo" style="color: var(--green1); font-size: 16px; font-weight: 600; text-align:left;">Logo</label>
                                <div class="border-dashed d-flex flex-column align-items-center justify-content-center mb-2" style="height:230px; width:230px; border:2px dashed rgba(0,61,43,0.5); border-radius:12px;">
                                    <i class="bi bi-image fs-1" style="color: var(--green1);"></i>
                                    <span class="upload-note d-block text-center" style="font-style: italic; font-weight: 500; font-size: 12px; background: var(--gradient-green); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent; line-height: 1.3;">Note: Upload here<br>supported file. Max 10 MB</span>
                                </div>
                                <button class="btn" style="width:150px; border-radius:8px; background:var(--gradient-brown); color:#fff; margin-top: 4px;">Upload Image</button>
                            </div>
                            <div class="col-md-7">
                                <label class="form-label fw-semibold" for="programDesc" style="color: var(--green1); font-size: 16px; font-weight: 600;">Description</label>
<style>
#programDesc[contenteditable="true"]:empty:before {
  content: attr(data-placeholder);
  color: rgba(0,61,43,0.5); /* --green1 at 50% opacity */
  font-weight: 500;
  pointer-events: none;
}
</style>
<div id="programDesc" contenteditable="true" class="form-control green1-opacity-input" data-placeholder="Description" style="min-height: 120px; background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; font-size: 16px; font-weight: 600; color: #000; outline: none;"></div>
                                <style>
.format-btn {
    background: none;
    border: none;
    color: var(--brown);
    font-size: 20px;
    margin: 0 6px;
    cursor: pointer;
    transition: color 0.2s;
    padding: 0 2px;
    line-height: 1;
}
.format-btn:active, .format-btn:focus {
    color: #8B5E3C;
    outline: none;
}
</style>
<div class="text-end mt-1 d-flex justify-content-end align-items-center" style="gap: 8px;">
    <button type="button" class="format-btn" title="Bold" onclick="formatDesc('bold')"><i class="bi bi-type-bold"></i></button>
    <button type="button" class="format-btn" title="Italic" onclick="formatDesc('italic')"><i class="bi bi-type-italic"></i></button>
    <button type="button" class="format-btn" title="Underline" onclick="formatDesc('underline')"><i class="bi bi-type-underline"></i></button>
    <button type="button" class="format-btn" title="Link" onclick="openLinkModal()"><i class="bi bi-link-45deg"></i></button>
<!-- Link Modal -->
<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="linkModalLabel">Insert Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="linkTextInput" class="form-label">Text</label>
          <input type="text" class="form-control" id="linkTextInput">
        </div>
        <div class="mb-3">
          <label for="linkUrlInput" class="form-label">Link</label>
          <input type="text" class="form-control" id="linkUrlInput" placeholder="https://">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="insertLink()">Done</button>
      </div>
    </div>
  </div>
</div>
    
</div>
<script>
function formatDesc(cmd) {
    const descDiv = document.getElementById('programDesc');
    descDiv.focus();
    if (cmd === 'bold') {
        document.execCommand('bold', false, null);
    } else if (cmd === 'italic') {
        document.execCommand('italic', false, null);
    } else if (cmd === 'underline') {
        document.execCommand('underline', false, null);
    }
}

// Modal-based link insertion
let linkSelection = null;
function openLinkModal() {
    const descDiv = document.getElementById('programDesc');
    descDiv.focus();
    // Save the selection
    const sel = window.getSelection();
    if (sel.rangeCount > 0) {
        linkSelection = sel.getRangeAt(0);
        const selectedText = sel.toString();
        document.getElementById('linkTextInput').value = selectedText;
    } else {
        linkSelection = null;
        document.getElementById('linkTextInput').value = '';
    }
    document.getElementById('linkUrlInput').value = '';
    const modal = new bootstrap.Modal(document.getElementById('linkModal'));
    modal.show();
}
function insertLink() {
    const text = document.getElementById('linkTextInput').value;
    const url = document.getElementById('linkUrlInput').value;
    if (!text || !url) return;
    const descDiv = document.getElementById('programDesc');
    descDiv.focus();
    // Restore selection
    if (linkSelection) {
        const sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(linkSelection);
    }
    // Create link element
    document.execCommand('insertHTML', false, `<a href='${url}' target='_blank' style='text-decoration:underline;'>${text}</a>`);
    // Hide modal
    const modalEl = document.getElementById('linkModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();
}
function formatDesc(cmd) {
    const descDiv = document.getElementById('programDesc');
    descDiv.focus();
    if (cmd === 'bold') {
        document.execCommand('bold', false, null);
    } else if (cmd === 'italic') {
        document.execCommand('italic', false, null);
    } else if (cmd === 'underline') {
        document.execCommand('underline', false, null);
    }
}
</script>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" for="programType" style="color: var(--green1); font-size: 16px; font-weight: 600;">Program Type</label>
                            <input type="text" class="form-control green1-opacity-input" id="programType" placeholder="Select or specify type here..." style="background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; font-size: 16px; font-weight: 600; color: rgba(0,61,43,0.5);" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" for="assignDirector" style="color: var(--green1); font-size: 16px; font-weight: 600;">Assign Director</label>
                            <style>
.user-pill {
    display: inline-flex;
    align-items: center;
    background: color-mix(in srgb, var(--mint) 50%, transparent);
    color: #003d2b;
    border-radius: 16px;
    padding: 2px 10px 2px 10px;
    margin: 2px 4px 2px 0;
    font-size: 15px;
    font-weight: 500;
}
.user-pill .remove-user {
    background: none;
    border: none;
    color: #003d2b;
    font-size: 16px;
    margin-left: 4px;
    cursor: pointer;
    line-height: 1;
    padding: 0;
}
.user-multiselect-input {
    border: 1px solid rgba(0,61,43,0.5);
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    color: rgba(0,61,43,0.5);
    background: #fff;
    min-height: 40px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    padding: 2px 8px;
    position: relative;
}
.user-multiselect-input input {
    border: none;
    outline: none;
    font-size: 16px;
    font-weight: 600;
    color: rgba(0,61,43,0.5);
    flex: 1;
    min-width: 120px;
    background: transparent;
    margin-left: 4px;
}
.user-multiselect-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 10;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 0 0 5px 5px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    max-height: 180px;
    overflow-y: auto;
}
.user-multiselect-dropdown .list-group-item {
    cursor: pointer;
}
</style>
<div style="position:relative;">
    <div id="userMultiSelect" class="user-multiselect-input">
        <!-- Pills will be inserted here -->
        <input type="text" id="assignDirectorInput" placeholder="Type user to select" autocomplete="off" oninput="showUserDropdownMulti(this)" onfocus="showUserDropdownMulti(this)">
    </div>
    <div id="userDropdownMulti" class="user-multiselect-dropdown list-group"></div>
</div>
<script>
const mockUsers = [
    'Test Admin', 'Jane Doe', 'John Smith', 'LBCasilang', 'LBCustodio', 'LBConwi', 'Ibcruz', 'LBCuevas', 'LBcalzado', 'LBCaparas'
];
let selectedUsers = [];
function renderSelectedUsers() {
    const container = document.getElementById('userMultiSelect');
    // Remove all pills except the input
    container.querySelectorAll('.user-pill').forEach(e => e.remove());
    selectedUsers.forEach((user, idx) => {
        const pill = document.createElement('span');
        pill.className = 'user-pill';
        pill.innerHTML = `${user}<button class='remove-user' type='button' onclick='removeUser(${idx})' tabindex='-1' aria-label='Remove'>&times;</button>`;
        container.insertBefore(pill, container.querySelector('input'));
    });
    document.getElementById('assignDirectorInput').value = '';
}
function showUserDropdownMulti(input) {
    const dropdown = document.getElementById('userDropdownMulti');
    const value = input.value.toLowerCase();
    if (!value) { dropdown.style.display = 'none'; dropdown.innerHTML = ''; return; }
    const matches = mockUsers.filter(u => u.toLowerCase().includes(value) && !selectedUsers.includes(u));
    if (matches.length === 0) { dropdown.style.display = 'none'; dropdown.innerHTML = ''; return; }
    dropdown.innerHTML = matches.map(u => `<button type='button' class='list-group-item list-group-item-action' onclick='selectUserMulti("${u}")'>${u}</button>`).join('');
    dropdown.style.display = 'block';
}
function selectUserMulti(name) {
    if (!selectedUsers.includes(name)) {
        selectedUsers.push(name);
        renderSelectedUsers();
    }
    document.getElementById('userDropdownMulti').style.display = 'none';
}
function removeUser(idx) {
    selectedUsers.splice(idx, 1);
    renderSelectedUsers();
}
// Hide dropdown if clicked outside
window.addEventListener('click', function(e){
    const dropdown = document.getElementById('userDropdownMulti');
    const input = document.getElementById('assignDirectorInput');
    if (!dropdown.contains(e.target) && e.target !== input) {
        dropdown.style.display = 'none';
    }
});
// Allow backspace to remove last user
const userInput = document.getElementById('assignDirectorInput');
userInput.addEventListener('keydown', function(e){
    if (e.key === 'Backspace' && !userInput.value && selectedUsers.length > 0) {
        removeUser(selectedUsers.length - 1);
    }
});
</script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-4" style="border-radius:16px;">
                        <h6 class="fw-bold mb-3">Appearance</h6>
                        <div class="mb-3">
                            <div class="small fw-semibold mb-1">Theme</div>
                            <div class="mb-2">
                                <span class="small">Title</span>
                                <select class="form-select form-select-sm d-inline w-auto ms-2" style="width:90px;">
                                    <option>Poppins</option>
                                </select>
                                <select class="form-select form-select-sm d-inline w-auto ms-2" style="width:60px;">
                                    <option>12</option>
                                </select>
                            </div>
                            <div>
                                <span class="small">Description</span>
                                <select class="form-select form-select-sm d-inline w-auto ms-2" style="width:90px;">
                                    <option>Poppins</option>
                                </select>
                                <select class="form-select form-select-sm d-inline w-auto ms-2" style="width:60px;">
                                    <option>12</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="small fw-semibold mb-1">Assign Background Color</div>
                            <div class="d-flex gap-2">
                                <span class="color-swatch" style="background:#6b8f71;width:28px;height:28px;border-radius:50%;display:inline-block;"></span>
                                <span class="color-swatch" style="background:#b6cfc9;width:28px;height:28px;border-radius:50%;display:inline-block;"></span>
                                <span class="color-swatch" style="background:#e5e1d8;width:28px;height:28px;border-radius:50%;display:inline-block;"></span>
                                <span class="color-swatch" style="background:#f5f2ec;width:28px;height:28px;border-radius:50%;display:inline-block;"></span>
                                <span class="color-swatch" style="background:#d9cfc1;width:28px;height:28px;border-radius:50%;display:inline-block;"></span>
                                <span class="color-swatch border border-2 d-flex align-items-center justify-content-center" style="width:28px;height:28px;border-radius:50%;border-color:var(--green1) !important;cursor:pointer;">+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

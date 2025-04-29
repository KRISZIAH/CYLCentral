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
                <h4 class="fw-semibold" style="color: var(--green1); font-size: 20px; font-weight: 600;">Edit Program</h4>
                <div class="d-flex gap-2">
                    <a href="{{ route('programs.index') }}" class="btn" style="border-radius:8px; background:transparent; border:1px solid var(--brown); color:var(--brown);">Cancel</a>
                    <button type="submit" name="save_draft" value="1" form="programForm" class="btn" style="border-radius:8px; background:transparent; border:1px solid var(--green1); color:var(--green1); padding-left:20px; padding-right:20px;">Save as Draft</button>
                    <button type="submit" name="publish" value="1" form="programForm" class="btn" style="border-radius:8px; background:var(--gradient-brown); color:#fff; padding-left:32px; padding-right:32px;">{{ $program->status == 'draft' ? 'Publish' : 'Update' }}</button>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card p-4" style="border-radius:16px;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form id="programForm" action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="name" style="color: var(--green1); font-size: 16px; font-weight: 600;">Title</label>
                                <input type="text" class="form-control gradient-green-input" id="name" name="name" value="{{ $program->name }}" style="background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; font-size:16px; font-weight:600; color: var(--green1);" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold" for="description" style="color: var(--green1); font-size: 16px; font-weight: 600;">Description</label>
                                <textarea id="description" name="description" class="form-control" style="background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; height: 230px; overflow-y: auto; padding: 10px; font-size:16px; color: var(--green1);" required>{{ $program->description }}</textarea>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-5 d-flex flex-column justify-content-start">
                                    <label class="form-label fw-semibold mb-1" for="logo" style="color: var(--green1); font-size: 16px; font-weight: 600; text-align:left;">Logo</label>
                                    <div id="logoDropArea" class="border-dashed d-flex flex-column align-items-center justify-content-center mb-2 position-relative" style="height:230px; width:230px; border:2px dashed rgba(0,61,43,0.5); border-radius:12px; overflow:hidden; cursor:pointer;">
                                        <input type="file" id="logo" name="logo" class="position-absolute" style="opacity: 0; width: 100%; height: 100%; cursor: pointer;" accept="image/*">
                                        <i class="bi bi-cloud-arrow-up" style="font-size: 48px; color: rgba(0,61,43,0.5);"></i>
                                        <p class="text-center mt-2" style="color: rgba(0,61,43,0.7);">Click to upload<br>or drag and drop</p>
                                        <div id="previewContainer" class="position-absolute" style="top: 0; left: 0; width: 100%; height: 100%; display: {{ $program->logo_path ? 'block' : 'none' }};">
                                            <img id="logoPreview" src="{{ $program->logo_path ? asset('storage/' . $program->logo_path) : '#' }}" alt="Logo Preview" style="width: 100%; height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                    <small class="text-muted mt-1" style="font-size: 12px;">
                                      <span style="color:#b0b0b0; font-weight:400;">Max file size:</span>
                                      <span style="color:#6c757d; font-weight:700;">5 MB</span>
                                      <span style="margin-left:12px;"></span>
                                      <span style="color:#b0b0b0; font-weight:400;">File type:</span>
                                      <span style="color:#6c757d; font-weight:700;">jpg, png, gif</span>
                                    </small>
                                </div>
                                <div class="col-md-7">
                                    <label class="form-label fw-semibold" for="type" style="color: var(--green1); font-size: 16px; font-weight: 600;">Program Type</label>
                                    <input type="text" class="form-control gradient-green-input" id="type" name="type" value="{{ $program->type }}" style="background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; font-size:16px; font-weight:600; color: var(--green1);" required />
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold" for="participants_count" style="color: var(--green1); font-size: 16px; font-weight: 600;">Participants Count</label>
                                <input type="number" class="form-control gradient-green-input" id="participants_count" name="participants_count" value="{{ $program->participants_count }}" style="background: #fff; border: 1px solid rgba(0,61,43,0.5); border-radius: 5px; font-size:16px; font-weight:600; color: var(--green1);" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Logo preview functionality
    document.getElementById('logo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('logoPreview').src = event.target.result;
                document.getElementById('previewContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection

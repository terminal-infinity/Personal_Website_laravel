@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Documents</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
          <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>
        <a href="{{ route('admin.document') }}">
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="download-cloud"></i>
          Back
        </button>
        </a>
      </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">{{ $doc->title }}</h6>
            <div style="max-width: 100%; margin: 20px auto; padding: 10px; border: 2px solid #ccc; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                
                @php
                    // Get the file extension
                    $fileExtension = strtolower(pathinfo($doc->file, PATHINFO_EXTENSION));
                    $imageExtensions = ['jpg', 'jpeg', 'png'];
                    $videoExtensions = ['mp4', 'webm'];
                    $docExtensions = ['pdf', 'doc', 'docx', 'xlsx'];
                @endphp
                
                @if(in_array($fileExtension, $imageExtensions))
                    <!-- Display image if file is an image type -->
                    <img src="{{ asset('public/upload/document/' . $doc->file) }}" style="width: 100%; border-radius: 10px;" alt="{{ $doc->title }}">
                
                @elseif(in_array($fileExtension, $videoExtensions))
                    <!-- Display video if file is a video type -->
                    <video controls style="width: 100%; border-radius: 10px;">
                        <source src="{{ asset('public/upload/document/' . $doc->file) }}" type="video/{{ $fileExtension }}">
                        Your browser does not support the video tag.
                    </video>
                
                @elseif(in_array($fileExtension, $docExtensions))
                    <!-- Display iframe for document types like PDF, DOC, DOCX, XLSX -->
                    <iframe src="{{ asset('public/upload/document/' . $doc->file) }}" style="width: 100%; height: 800px; border: none; border-radius: 10px;"></iframe>
                
                @else
                    <!-- Message for unsupported file types -->
                    <p>Preview not available for this file type.</p>
                @endif
                
            </div>
        </div>
    </div>
</div>



</div>
@endsection
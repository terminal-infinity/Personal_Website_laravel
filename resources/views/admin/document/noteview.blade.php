@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">My Notepad</h4>
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

    <div class="row profile-body">
  <!-- middle wrapper start -->
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Notepad Document</h6>
        <div class="row mt-4">
          
          @foreach ($note as $notes)
            <!-- Folder -->
          <div class="col-md-2 text-center mb-3">
            <a href="{{ route('admin.notepad_file', $notes->id) }}">
              <img width="80" src="{{ asset('public/upload/file.png') }}" alt="">
              <p class="mt-3 mx-2 fw-bold" style="font-size: 1rem;">{{ $notes->title }}</p>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>


</div>
@endsection
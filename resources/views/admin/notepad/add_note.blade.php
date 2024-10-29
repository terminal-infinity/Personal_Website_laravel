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

        <a href="{{ route('admin.notepad') }}">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Back
            </button>
        </a>
      </div>
    </div>

@include('_message')
    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                  <form class="forms-sample" action="{{ route('admin.upload_note') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label class="form-label">Note Title </label>
                          <input type="text" class="form-control" name="title" placeholder="Title" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Note </label>
                        <textarea name="description" id="summernote" cols="30" rows="10" class=" form-control" placeholder="Description" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <a href="{{ route('admin.notepad') }}" class="btn btn-secondary">Cancel</a>
                  </form>
            </div>
          </div>
                  </div>
        <!-- middle wrapper end -->
    </div>

</div>
@endsection
@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Add Document</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
          <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>

        <a href="{{ route('admin.document_folder',$folder->id) }}">
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
                <form class="forms-sample" action="{{ route('admin.upload_document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 d-flex">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Folder: </label>
                        <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                        <p class="text-dark fs-5">{{ $folder->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" require>
                        <span style="color: red;">{{ $errors->first('title') }}</span>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Document </label>
                      <input type="file" class="form-control" name="file" require>
                      <span style="color: red;">{{ $errors->first('file') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admin.document_folder',$folder->id) }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
      <!-- middle wrapper end -->
</div>
@endsection
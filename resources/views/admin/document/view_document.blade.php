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

      </div>
    </div>

    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('admin.upload_folder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Folder Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Folder Name" require>
                        <span style="color: red;">{{ $errors->first('name') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Create</button>
                    <a href="{{ route('admin.document') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>


<div class="row profile-body">
  <!-- middle wrapper start -->
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Document Folders</h6>
        <div class="row mt-4">
          
          @foreach ($folder as $folders)
            <!-- Folder -->
          <div class="col-md-2 text-center mb-3">
            <a href="{{ route('admin.document_folder', $folders->id) }}">
              <img width="80" src="{{ asset('public/upload/folder.png') }}" alt="">
              <p class="mt-3 mx-2 fw-bold" style="font-size: 1rem;">{{ $folders->name }}</p>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Notepad Document Folders</h6>
        <div class="row mt-4">
            <!-- Notepad Folder -->
          <div class="col-md-2 text-center mb-3">
            <a href="{{ route('admin.note_document') }}">
              <img width="80" src="{{ asset('public/upload/folder.png') }}" alt="">
              <p class="mt-3 mx-2 fw-bold" style="font-size: 1rem;">My Notepad</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
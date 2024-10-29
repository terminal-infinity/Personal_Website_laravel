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

        <a href="{{ route('admin.note_document') }}">
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
                    <div class="mb-3 ">
                        <p class="form-control-static text-uppercase fw-bolder" style="font-size: 1.25rem;">Title : {{ $note->title }}</p>
                    </div>
                    <div class="mb-3 mx-3">
                        <div class="form-control-static">
                            {!! $note->description !!}
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-2 mt-5">
                    <a href="{{ route('admin.delete_note',$note->id) }}">
                        <button type="button" class="btn btn-danger btn-icon-text mb-2 mb-md-0 px-2">
                        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                         Delete Note
                        </button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>

</div>
@endsection
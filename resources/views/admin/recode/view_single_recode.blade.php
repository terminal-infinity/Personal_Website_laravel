@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">View Single Recode</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
          <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>

        <a href="{{ route('admin.recode') }}">
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="download-cloud"></i>
          Back
        </button>
      </a>
      </div>
    </div>
    @include('_message')
    <div class="row profile-body justify-content-center">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-12 col-xl-12 left-wrapper ">
        <div class="card px-5 rounded">
          <div class="card-body ">
            <div class="d-flex align-items-center justify-content-end mb-2">
              <div>
                <img class="wd-150 rounded-circle" src="{{ !empty($recode->photo) ? url('public/upload/recode/'.$recode->photo) : url('public/upload/no_image.jpg') }}" alt="profile">
              </div>
            </div>
            <div class="mt-5 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Name:</label>
                <p class="text-dark fs-5">{{ $recode->name }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Contact Number:</label>
                <p class="text-dark fs-5">{{ $recode->contact }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Email:</label>
                <p class="text-dark fs-5">{{ $recode->email }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Blood Group:</label>
                <p class="text-dark fs-5">{{ $recode->blood_group }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Relation Type:</label>
                <p class="text-dark fs-5">{{ $recode->type }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Present Address:</label>
                <p class="text-dark fs-5">{{ $recode->present_address }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Permanent Address:</label>
                <p class="text-dark fs-5">{{ $recode->permanent_address }}</p>
            </div>
            <div class="mt-4 d-flex align-items-center">
                <label class="tx-11 fw-bolder mb-0 text-uppercase me-2 fs-5">Salary:</label>
                <p class="text-dark fs-5">{{ $recode->salary }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-end mb-2 mt-5">
            <a href="{{ route('admin.delete_recode',$recode->id) }}">
                <button type="button" class="btn btn-danger btn-icon-text mb-2 mb-md-0 px-2">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Delete Recode
                </button>
            </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      
    </div>

</div>
@endsection
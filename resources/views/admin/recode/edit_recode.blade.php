@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Recode</h4>
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

    
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit Records</h6>
                    <form class="forms-sample" action="{{ route('admin.update_recode',$recode->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name </label>
                            <input type="text" class="form-control" name="name" placeholder="name" value="{{ $recode->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email" value="{{ $recode->email }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Number </label>
                            <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="{{ $recode->contact }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Relation Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="{{ $recode->type }}">{{ $recode->type }}</option>
                                <option value="Friends">Friends</option>
                                <option value="Relatives">Relatives</option>
                                <option value="Office">Office</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Present Address </label>
                            <input type="text" class="form-control" name="present_address" placeholder="Present Address" value="{{ $recode->present_address }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" name="permanent_address" placeholder="Permanent Address" value="{{ $recode->permanent_address }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Blood Group</label>
                            <select name="blood_group" id="blood_group" class="form-control">
                                <option value="{{ $recode->blood_group }}">{{ $recode->blood_group }}</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            <input type="text" class="form-control" name="salary" placeholder="Salary" value="{{ $recode->salary }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="photo" id="image">
                            @if (!empty($recode->photo))
                                <img id="showImage" src="{{ asset('public/upload/recode/'.$recode->photo) }}" style="width: 200px; height:auto; margin-top:5px;" >
                            @endif 
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('admin.recode') }}" class="btn btn-secondary">Cancel</a>
                    </form>
              </div>
            </div>
           </div>
        <!-- middle wrapper end -->
    </div>

</div>

@endsection
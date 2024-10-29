@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
        <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Total Document</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mt-2">{{ $documents }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Total Records</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mt-2">{{ $recodes }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Total Notes</h6>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mt-2">{{ $notes }}</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

  <div class="row mb-5">
					<div class="col-lg-12 stretch-card">
						<div class="card">
							<div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <h4 class="card-title">Latest Records</h4>
                <a href="{{ route('admin.recode') }}">
                <button type="button" class="btn btn-primary btn-icon-text mb-md-0">
                  <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    See All Records
                </button>
                </a>
                </div>
								
								<div class="table-responsive pt-3">
									<table class="table table-bordered">
										<thead>
											<tr>
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Type</th>
                          <th>Email</th>
                          <th>Blood Group</th>
                          <th>Salary</th>
                          <th>Present Address</th>
                          <th>Permanent Address</th>
											</tr>
										</thead>
										<tbody>
                        @foreach ($recode as $recodes)
                        <tr class="table-info text-dark">
                        <td>
                          @if (!empty($recodes->photo))
                          <img id="showImage" src="{{ asset('public/upload/recode/'.$recodes->photo) }}" style="width: 50px; height:auto" >
                          @endif 
                          </td>
                          <td><a href="{{ route('admin.view_recode',$recodes->id) }}">{{ $recodes->name }}</a></td>
                          <td>{{ $recodes->contact }}</td>
                          <td>{{ $recodes->type }}</td>
                          <td>{{ $recodes->email }}</td>
                          <td>{{ $recodes->blood_group }}</td>
                          <td>{{ $recodes->salary }}</td>
                          <td>{{ $recodes->present_address }}</td>
                          <td>{{ $recodes->permanent_address }}</td>
                        </tr>
                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

        <div class="row mb-5">
					<div class="col-lg-12 stretch-card">
						<div class="card">
							<div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <h4 class="card-title">Latest Notes</h4>
                <a href="{{ route('admin.notepad') }}">
                <button type="button" class="btn btn-primary btn-icon-text mb-md-0">
                  <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    See All Notes
                </button>
                </a>
                </div>
								
								<div class="table-responsive pt-3">
									<table class="table table-bordered">
										<thead>
											<tr>
                          <th>Title</th>
                          <th>View</th>
											</tr>
										</thead>
										<tbody>
                        @foreach ($note as $notes)
                        <tr class="table-success text-dark">
                        <td>{{ $notes->title }}</td>
                        <td><a href="{{ route('admin.notepad_file', $notes->id) }}"> <i style="color: green" data-feather="eye"></i></a></td>
                        </tr>
                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

        <div class="row mb-5">
					<div class="col-lg-12 stretch-card">
						<div class="card">
							<div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <h4 class="card-title">Latest Document</h4>
                <a href="{{ route('admin.document') }}">
                <button type="button" class="btn btn-primary btn-icon-text mb-md-0">
                  <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    See All Document
                </button>
                </a>
                </div>
								
								<div class="table-responsive pt-3">
									<table class="table table-bordered">
                  <thead>
											<tr>
                          <th>Title</th>
                          <th>Document</th>
                          <th>Download</th>
                          <th>Delete</th>
											</tr>
										</thead>
										<tbody>
                        @foreach ($document as $documents)
                        <tr class="table-primary text-dark">
                          <td>{{ $documents->title }}</td>
                          <td><a href="{{ route('admin.view',$documents->id) }}"><i style="color: green" data-feather="eye"></i></a></td>
                          <td><a href="{{ route('admin.download',$documents->file) }}"><i style="color: green" data-feather="download"></i></a></td>
                          <td><a href="{{ route('admin.delete_document',$documents->id) }}"><i style="color: red" data-feather="x-circle"></i></a></td>
                        </tr>
                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

</div>
@endsection

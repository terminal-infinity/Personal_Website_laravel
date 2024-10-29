@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
  @include('_message')
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div>
                    <img class="wd-100 rounded-circle" src="{{ !empty($data->photo) ? url('public/upload/admin_images/'.$data->photo) : url('public/upload/no_image.jpg') }}" alt="profile">
                    <span class="h4 ms-3">{{ $data->username }}</span>
                </div>
            </div>
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                <p class="text-muted">{{ $data->name }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
              <p class="text-muted">{{ $data->address }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{ $data->email }}</p>
            </div>
            <div class="mt-3">
                <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                <p class="text-muted">{{ $data->updated_at }}</p>
              </div>
          </div>
        </div>
      </div>
<!-- middle wrapper start -->
<div class="col-md-7 col-xl-8 middle-wrapper">
    <div class="row">
        <div class="card">
            <div class="card-body">
                    <h6 class="card-title">Change Password</h6>
                <form class="forms-sample" action="{{ route('admin.password_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                </form>
            </div>
          </div>
    </div>
  </div>
  <!-- middle wrapper end -->
</div>

</div>

@endsection
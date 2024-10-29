@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Documents/{{ $folder->name }}</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
          <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
          <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>
        <a href="{{ route('admin.document_folder_add',$folder->id) }}">
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="download-cloud"></i>
          Add Document
        </button>
        </a>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">{{ $folder->name }}</h6>
                  <div class="table-responsive">
                    <table id="dataTableExample" class="table">
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
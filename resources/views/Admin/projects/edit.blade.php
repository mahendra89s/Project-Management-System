@extends('Admin.layouts.master')

@section('title')
  Edit Project
@endsection('title')
@section('css')
    <style>
    
      .card label{
            color:black;
        }
        .form-control{
            border:1px solid #222831;
        }
        .btn{
            background-color:#222831;
            border-radius:50px;
        }
        .btn:hover{
            background-color:#222831;
        }
        #cancel{
            background-color:red;
        }
        .card label{
          font-size:17px;
          font-weight:bold;
        }
        textarea.form-control{
          border:1px solid #222831;
          border-radius:10px;
        }
        textarea.form-control:focus{
          border:1px solid #222831;
        }
      </style>
@endsection('css')
@section('content')
      <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Edit Project</h2>
        </div>
      </div>
      <div class="content">
        <div class="row">
        <div class="col-md-3">
            
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
              <form action="{{ route('project.edit1',['id' => $project->id]) }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Name</label>
                  <input type="text" name="projname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $project->project_name }}" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Client Name</label>
                  <input type="text" name="cliname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $project->client_name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ $project->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" name='status'>
                    <option value="0" {{ ($project->status == 0) ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ ($project->status == 1) ? 'selected' : '' }}>Completed</option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-dark">Submit</button>
                  <a href="{{ route('admin.projects') }}" id="cancel" class="btn btn-danger">Cancel</a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection('content')
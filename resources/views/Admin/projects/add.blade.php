@extends('Admin.layouts.master')

@section('title')
  Add Project
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
          <h2 class="title">Add Project</h2>
        </div>
      </div>
      <div class="content">
        <div class="row">
        <div class="col-md-3">
            
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
              <form action="{{ route('project.add1') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Name</label>
                  <input type="text" name="projname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Project Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Client Name</label>
                  <input type="text" name="cliname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Client Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
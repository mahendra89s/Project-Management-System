@extends('Admin.layouts.master')

@section('title')
    Edit-User
@endsection('title')
@section('css')
    <style>
    
        .card label{
            color:black;
            font-weight:bold;
            font-size:20px;
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
        
    </style>
@endsection('css')
@section('content')
    <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Edit User</h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.edit1',['id' => $user->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Id</label>
                            <input type="text" name="id" class="form-control" id="exampleFormControlInput1" value="{{ $user->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">User Type</label>
                            <select name="user_type" class="form-control">
                                    <option value="0" {{ ($user->user_type == 0) ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ ($user->user_type == 1) ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('user_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a href="{{ route('admin.user') }}" id="cancel" class="btn btn-danger">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
@extends('Admin.layouts.master')

@section('title')
  Users
@endsection('title')
@section('css')
  <style>
    .card{
      background-color: #d2d8d6;
      background-image: linear-gradient(315deg, #d2d8d6 0%, #dce8e0 74%);
      
    }
    .table>thead>tr>th{
      font-weight: bold;
      color:black;
    }
    #edit{
      border-radius:20px;
      background-color: #ff4e00;
      background-image: linear-gradient(315deg, #ff4e00 0%, #ec9f05 74%);
    }
    #delete{
      border-radius:20px;
      background-color: #f71735;
background-image: linear-gradient(147deg, #f71735 0%, #db3445 74%);
    }
  </style>
@endsection('css')
@section('content')
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Users</h2>
        </div>
      </div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-body">
              
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        User Type
                      </th>
                      <th >
                        Edit
                      </th>
                      <th >
                        Delete
                      </th>
                    </thead>
                    <tbody>
                   
                    @foreach($users as $user)
                      <tr>
                        <td>
                          {{ $user->name }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          <?php
                                if($user->user_type == 1){
                                  $user1 = 'ADMIN';
                                }
                                else{
                                  $user1 = 'USER';
                                }
                          ?>
                          {{ $user1 }}
                        </td>
                        <td >
                          <form action="{{ route('user.edit',['id' => $user->id]) }}" method='GET'>
                            @csrf
                            <button type="submit" class="btn btn-warning" id="edit">Edit</button>
                          </form>
                          
                        </td>
                        <td >
                          <form action="{{ route('user.delete',['id' => $user->id]) }}" method='POST'>
                            @csrf
                            <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                          </form>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      
@endsection('content')
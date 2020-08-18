@extends('Admin.layouts.master')

@section('title')
  Add Member
@endsection('title')
@section('css')
<style>
      #back{
        border-radius:20px;
        background-color: #f71735;
        background-image: linear-gradient(147deg, #f71735 0%, #db3445 74%);
      }
      .card{
      background-color: #d2d8d6;
      background-image: linear-gradient(315deg, #d2d8d6 0%, #dce8e0 74%);
      
    }
    .table>thead>tr>th{
      font-weight: bold;
      color:black;
    }
    #add{
      border-radius:20px;
      background-color: #7f5a83;
background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%);

    }
    </style>
@endsection('css')
@section('content')
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Add Member</h2>
        </div>
      </div>
      <div class="content">
        <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Add Member To Project
                    </th>
                    <th>
                        Add
                    </th>
                    </thead>
                    <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>
                            {{ $u->name }} 
                        </td>
                        <td>
                            <a href="{{ route('member.add1',['id' => $u->id , 'pid' => $project->id]) }}" id="add" class="btn btn-info">Add</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <a href="{{ route('project.member',['id' => $project->id]) }}" id="back" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection('content')
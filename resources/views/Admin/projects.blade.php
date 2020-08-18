@extends('Admin.layouts.master')

@section('title')
  Projects
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
    #member{
      border-radius:20px;
      background-color: #485461;
      background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
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
    #add{
      border-radius:20px;
    }
  </style>
@endsection('css')
@section('content')
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Projects</h2>
        </div>
      </div>
      
<div class="content">
        <div class="row">
        
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-body">
              <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                    <div class="font-icon-detail">
                      
                      <a href="{{ route('project.add') }}" id="add" class="btn btn-danger text-right"><i class="now-ui-icons ui-1_simple-add"></i> Add Project</a>
                    </div>
              </div>
              <p>Click on Project name to view Projects Details</p>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                      Sr No.
                      </th>
                      <th>
                        Project Name
                      </th>
                      <th>
                        Client Name
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Member
                      </th>
                      <th >
                        Edit
                      </th>
                      <th >
                        Delete
                      </th>
                    </thead>
                    <tbody>
                    @php
                      $i=1;
                    @endphp
                    @foreach($projects as $project)
                      <tr>
                        <td>
                        {{ $i }}
                        </td>
                        <td>
                          <a href="{{ route('project.show',['id' => $project->id]) }}" style="font-weight:bold;">{{ $project->project_name }}</a>
                        </td>
                        <td>
                          {{ $project->client_name }}
                        </td>
                        <td>
                          {{ str_limit($project->description, 20) }}
                          
                        </td>
                        
                        <td>
                          @php
                            if($project->status == 1)
                              {$status = 'Completed';
                              
                              }
                            else
                            {$status = 'Pending';
                            }
                          @endphp
                          <p class="{{ ($status == 'Completed')? 'text-success' : 'text-danger' }}">{{ $status }}</p>
                        </td>
                        <td>
                          <a href="{{ route('project.member',['id' => $project->id]) }} " id="member"class="btn btn-info">
                          
                          Member
                          </a>
                        </td>
                        <td >
                          <form action="{{ route('project.edit',['id' => $project->id]) }} " method='GET'>
                            @csrf
                            <button type="submit" class="btn" id="edit">Edit</button>
                          </form>
                          
                        </td>
                        <td >
                          <form action="{{ route('project.delete',['id' => $project->id]) }} " method='GET'>
                            
                            <button type="submit" class="btn" id="delete">Delete</button>
                            
                          </form>
                        </td>
                      </tr>
                      
                      @php
                            $i++;
                      @endphp
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      
@endsection('content')
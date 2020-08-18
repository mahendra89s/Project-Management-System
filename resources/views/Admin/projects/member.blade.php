@extends('Admin.layouts.master')

@section('title')
  Member
@endsection('title')
@section('css')
    <style>
      #delete{
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
    }
    h4{
      font-weight: bold;
      color:red;
    }
    </style>
    
@endsection('css')
@section('content')
<div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Members</h2>
        </div>
      </div>
      <div class="content">
        <div class="row">
        <div class="col-md-3">
            
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
              <div>
                <a href="{{ route('member.add',['id' => $id]) }}" id="add" class="btn btn-warning"><i class="now-ui-icons ui-1_simple-add"></i> Add Member</a>
              </div>
              <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        Members Associated with Project
                    </th>
                    <th>
                        Delete
                    </th>
                    </thead>
                    <tbody>
                    
                     
                    
                    @foreach($pro_mem as $mem)
                    <tr>
                        <td>
                        
                        {{ $mem->name }}
                        </td>
                        <td>
                            <a href="{{ route('member.delete',['mid' => $mem->pivot->user_id , 'pid' => $id]) }}" class="btn" id="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                
                @if($pro_mem->isEmpty())
                        <h4>No Members</h4>
                      @endif
                </div>
                <a href="{{ route('admin.projects') }}" id="delete" class="btn btn-danger">Back</a>
              </div>
            </div>
        </div>
    </div>
    </div>

@endsection('content')
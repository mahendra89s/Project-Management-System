@php
use App\User;
@endphp
@extends('Admin.layouts.master')
@section('title')
    Project View
@endsection('title')
@section('css')
    <style>
        .card{
      background-color: #d2d8d6;
      background-image: linear-gradient(315deg, #d2d8d6 0%, #dce8e0 74%);
      
    }
        .member{
            
            font-size:20px;
            margin-top:5px;
            padding-left:10px;
            font-weight:bold;
            background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
            border-radius:35px;
            color:white;
            margin-bottom:20px;
        }
        .task{
           border-radius:35px;
            font-size:20px;
            margin-bottom:10px;
            padding-left:10px;
            font-weight:bold;
            background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
            padding:10px 20px;
        }
        .msg{
            font-size:20px;
            font-weight:bold;
        }
        #btn1{
            cursor:default;
            border-radius:25px;
            background-color: #212121;
        }
        #btn2{
            cursor:default;
            border-radius:25px;
            background-color:#000000;
        }
    </style>
@endsection('css')
@section('content')
    <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">{{ $project->project_name }}</h2>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Client Name :</b> {{ $project->client_name }}</h3>
                    </div>
                    <div class="card-body">
                        <h3><b>Description : </b>{{ $project->description }}</h3>
                        @php
                            if($project->status == 1)
                            {
                                $status = 'Completed';
                            }
                            else{
                                $status = 'In Progress';
                            }
                        @endphp
                        <h3><b>Status :</b> <span class="{{ ($status == 'In Progress') ? 'text-danger' : 'text-success' }}"> {{ $status }}</span> </h3>
                        <h3><b>Members :</b></h3>
                        <div class="col-md-6">
                        
                                @if($mem->isEmpty())
                                
                                    <span class="msg text-danger">NO MEMBER ASSOCIATED</span>
                                
                                @endif
                            @foreach ($mem as $m)
                            <div class="member">
                            
                                {{ $m->name }}
                            </div>
                            @endforeach
                        </div>
                            
                        
                            <br>
                        <h3><b>Tasks :</b></h3>
                        <div class="col-md-12">
                                @if($task->isEmpty())
                                    <span class="msg text-danger">NO TASK ASSOCIATED</span>
                                @endif
                            @foreach ($task as $t)
                            @php
                                $user = User::findOrFail($t->user_id);
                            @endphp
                            <div class="task">
                            <div class="btn" id="btn2">{{ $t->title }}</div>
                                
                                <div class="btn" id="btn1">Added By : {{ $user->name }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection('content')
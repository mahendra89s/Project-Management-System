@php
    use Illuminate\Support\Facades\Session;
    Session::put('project_id',$id);
@endphp
@extends('User.layouts.master')
@section('title')
    Manage Task
@endsection('title')
@section('css')

    <link rel="stylesheet" href="{{ asset('assets/user/css/task-show.css')}}" />
@endsection('css')
@section('content')
<div class="container my-5">
        <div class="row head">
            <div class="md-12">
                <div class="header px-3">
                    Tasks :
                    
                </div> 
                <div class="addbtn">
                    <a class="btn" id="btn1" href={{ route('task.add',['pid' => $id]) }}><i class="fas fa-plus"></i> Add Task</a>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row">
        
        <div class=" col-md-8">
        @if(count($tasks)<= 0)
            <h1 style="color: white;">No Task Associated</h1>
        @endif
            @foreach($tasks as $task)
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="prjname px-3 pt-2 mb-3">
                                    <h1>{{ $task->title }}</h1>
                                </div>
                                <div class="prjdetails px-3 py-2">
                                    <h5>{{ $task->Task_description }} </h5>
                                </div> 
                                <div class="status mt-4">
                                    @php
                                        $user = $task->user;
                                    @endphp
                                    <a class="btn">{{ $user->name }}</a>
                                    <a class="btn" id="btn1">{{ $task->created_at }}</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="sidedetails">
                                    <div class="startdate">
  
                                        <p>Begin At : </p>  
                                            <p class="@if($task->start_date == NULL){ text-danger font-weight-bold } @endif">
                                                {{($task->start_date == NULL)? "Pending" : $task->start_date}}
                                            </p>
                                    </div>
                                    <div class="completed">
                                        
                                        <p>Completed On : </p>  
                                            <p class="@if($task->end_date == NULL){ text-danger font-weight-bold } @else { text-success } @endif">
                                                {{($task->end_date == NULL)? "Pending" : $task->end_date}}
                                            </p>
                                    </div>
                                    <div class="edit">
                                        
                                        <a class="btn @if($task->user_id != $userid){ disabled } @endif" id="edit" href="{{ route('task.edit',['tid' => $task->id , 'pid' => $id]) }}">Edit</a>
                                        <a class="btn @if($task->user_id != $userid){ disabled } @endif" id="delete" href="{{ route('task.delete',['tid' => $task->id , 'pid' => $id]) }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                
            </div>
            
            <div class=" col-md-3">
                <div class="card ">
                    <div class="card-body">
                        <div class=" px-3 pt-2 mb-3">
                        <h3><b>Members</b></h3>
                        <ul>
                        @foreach($mem as $m)
                            <li><h5>{{ $m->name }}</h5></li>
                        @endforeach
                        </ul>
                        </div>
                        
                       
                    </div>
                </div>
            </div>

        </div>
        {{ $tasks->links() }}
    </div>

    
@endsection('content')
@extends('User.layouts.master')
@section('title')
    Edit Task
@endsection('title')
@section('css')

    <link rel="stylesheet" href="{{ asset('assets/user/css/task-edit.css')}}" />
   
@endsection('css')
@section('content')
<?php use Carbon\Carbon; ?>



    
    <div class="container my-5">
        <div class="row">
        
        <div class="col-md-2"></div>
        <div class=" col-md-8">
                <div class="card ">
                    
                    <div class="header  mt-3">
                        <div class="title ">
                            <h1 class="text-center px-3">Edit Task</h1>
                        </div>
                        
                
                    </div>
                
                    <form action="{{ route('edit.save',['tid' => $task->id ]) }}" method="POST">
                    @csrf
                        <div class="form-group mx-3 mt-3">
                            <label class="">Task Title</label>
                            <input class="form-control" type="text" name="task_title" value="{{ $task->title }}" />
                            @error('task_title')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group mx-3">
                            <label class="">Task Description</label>
                            <textarea class="form-control" type="text" name="task_desc" >{{ $task->Task_description }}</textarea>
                            @error('task_desc')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror    
                        </div>
                        <div class="form-group mx-3">
                            <label for="example-datetime-local-input" class="">Starting Date</label>
                            <!-- 2020-07-19T13:45:00 -->
                            @php
                                $strt = Carbon::parse($task->start_date)->format('Y-m-d\TH:i');
                            @endphp
                            
                            <input class="form-control" name="date_time" type="datetime-local" value="{{ $strt }}" id="example-datetime-local-input">
                            @error('date_time')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group mx-3">
                        <div class="form-check">
                        
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="1" name="completed" 
                            @if(!is_null($task->end_date))checked @endif>
                            <label for="example-datetime-local-input" class=""> Mark As Completed</label>
                        </div>
                            
                            
                            
                        </div>
                        <div class="form-group  mx-3">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a class="btn" id='btn1' href="{{ url()->previous() }}">Back</a>
                        </div>
                    </form>
                    
                </div>
               

            
            

        </div>
    </div>

@endsection('content')
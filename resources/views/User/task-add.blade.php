@extends('User.layouts.master')
@section('title')
    Add Task
@endsection('title')
@section('css')

    <link rel="stylesheet" href="{{ asset('assets/user/css/task-add.css')}}" />
   
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
                            <h1 class="text-center px-3">Add Task</h1>
                        </div>
                        
                
                    </div>
                
                    <form action="{{ route('task.save',['pid' => $id]) }}" method="post">
                    @csrf
                        <div class="form-group mx-3 mt-3">
                            <label class="">Task Title</label>
                            <input class="form-control" type="text" name="task_title" placeholder="Enter Task Title" />
                            @error('task_title')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group mx-3">
                            <label class="">Task Description</label>
                            <textarea class="form-control" type="text" name="task_desc" placeholder="Enter Task description"></textarea>
                            @error('task_desc')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror    
                        </div>
                        <div class="form-group mx-3">
                            <label for="example-datetime-local-input" class="">Starting Date</label>
                            <!-- 2020-07-19T13:45:00 -->
                            <input class="form-control" name="date_time" type="datetime-local" value="" id="example-datetime-local-input">
                            @error('date_time')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group  mx-3">
                            <button type="submit" class="btn btn-dark">Submit</button>
                            <a class="btn" id='btn1' href="{{ route('user.manage',['id' => $id]) }}">Back</a>
                        </div>
                    </form>
                    
                </div>
               

            
            

        </div>
    </div>

@endsection('content')
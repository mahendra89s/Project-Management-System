@extends('User.layouts.master')
@section('title')
User
@endsection('title')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user/css/landing.css' )}}" />
@endsection('css')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="md-12">
                <div class="header px-3">
                    Projects :
                </div> 
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
        @if(empty($projects))
            <h1 style="color: white;">NO PROJECT ASSOCIATED<h1>
        @endif
        @foreach($projects as $project)
            @foreach($project as $p)
            
           
            <div class=" col-md-6 mb-5">
                <div class="card ">
                    
                    <div class="card-body">
                        <div class="prjname px-3 pt-2 mb-3">
                            <h1>{{ $p->project_name }}</h1>
                        </div>
                        
                        <div class="prjdetails px-3 py-2">
                            <h5>{{ $p->description }}</h5>
                        </div> 
                        <div class="status mt-4">
                            <a class="btn"><span class="badge badge-light">
                                {{ $p->users->Count() }}
                            </span> Member</a>
                            <a class="btn" id="btn1" href="{{ route('user.manage',['id' => $p->id]) }}">Manage Task</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
            <!-- <div class=" col-md-6">
                <div class="card ">
                    
                    <div class="card-body">
                        <div class="prjname px-3 pt-2 mb-3">
                            <h1>Project2</h1>
                        </div>
                        
                        <div class="prjdetails px-3 py-2">
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took </h5>
                        </div>
                        <div class="status mt-4">
                            <a class="btn"><span class="badge badge-light">4</span> Member</a>
                            <a class="btn" id="btn1">Manage Task</a>
                        </div>
                    </div>
                </div>
            </div> -->
            
            
        </div>
    </div>
@endsection('content')
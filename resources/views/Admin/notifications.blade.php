@extends('Admin.layouts.master')
@section('title')
  Notification
@endsection('title')
@section('css')
  <style>
    .alert{
      background-color: #424242;
      color: white;
      border-radius:25px;
    }
    .icon{
      float: right;
    }
    .ui-1_check{
      color:white;
      background-color:#e53935;
      border-radius:25px;
      padding:10px 10px;
    }
    .ui-1_check:hover{
      color:white;
      text-decoration:none;
      box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);
    }
    .ui-2_like{
      color:white;
      background-color:#1a237e;
      border-radius:50%;
      padding:10px 10px;
      margin-top:-10px;
    }
  </style>
@endsection('css')
@section('content')
      <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">Notifications</h2>
          
        </div>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Notifications</h4>
              </div>
              <div class="card-body">
              @if($notifications->isEmpty())
                <b>No Notification</b>
              @endif
                @foreach($notifications as $n)
                @php
                  $user = \App\User::find($n->user_id);
                  $user_name = $user->name;
                  $p = \App\Task::find($n->task_id);
                  $proj = $p->project_id;
                 @endphp
                 <div class="alert  alert-with-icon" data-notify="container">
                  
                  
                  
                  <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                  <span data-notify="message"><b>{{$user_name}}</b> {{ $n->message }} id : {{ $n->task_id}} in Project id : {{$proj}}</span>
                  <span class="icon">@if($n->status == 0)<a href="{{ route('notification.read',['id' => $n->id]) }}" class="ui-1_check">Mark as Read</a> @else <a href="#" data-toggle="tooltip" data-placement="bottom" title="Marked"><i class="now-ui-icons ui-2_like"></i></a>@endif </span>
                </div>

              
                @endforeach
              </div>
              {{$notifications->links()}}
            </div>
          
          </div>
        </div>
      </div>
      <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });
      </script>
@endsection('content')
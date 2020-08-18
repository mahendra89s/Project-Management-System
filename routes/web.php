<?php

use App\Task;
use App\User;
use App\Project;
use App\Notification;
use App\Http\Controllers\Admin\UserEdDelController;


Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth','admin'] ,'prefix'=>'admin'],function(){
    Route::get('/',function(){
        $user = User::where('user_type',0)->count();
        $project = Project::count();
        $completed_project = Project::where('status',1)->count();
        $pending_project = Project::where('status',0)->count();
        
        return view('Admin.dashboard',compact('user', 'project', 'completed_project','pending_project'));
    })->name('admin.dashboard');

    Route::get('/notification',function(){
        $notifications = Notification::orderBy('id','desc')->paginate(10);
        return view('Admin.notifications', compact('notifications'));
    })->name('admin.notifications');

    Route::get('/noti/{id}','Admin\NotificationController@show')->name('notification.read');

    Route::get('/projects',function(){
        $projects = Project::all();
        return view('Admin.projects',compact('projects'));
    })->name('admin.projects');

    Route::get('/user',function(){
        $users = User::all();   
        return view('Admin.user',compact('users'));
    })->name('admin.user');

    
    Route::group(['prefix' => 'user-edit'],function(){
        Route::get('/{id}',function($id){
            $user = User::find($id);
            return view('Admin.user.edit',compact('user'));
        })->name('user.edit');
        Route::post('/edit/{id}','Admin\UserEdDelController@edit')->name('user.edit1');
        
    });
    
    Route::post('/user-delete/{id}','Admin\UserEdDelController@delete')->name('user.delete');

    //Admin Project side
    Route::group(['prefix' => 'projects'],function(){
        Route::get('/add-proj',function(){
            return view('Admin.projects.add');
        })->name('project.add');



        Route::get('/show/{id}','Admin\AddProjectController@show')->name('project.show');




        Route::post('/add','Admin\AddProjectController@add')->name('project.add1');
        Route::get('/delete/{id}','Admin\AddProjectController@delete')->name('project.delete');
        
        Route::get('/edit-proj/{id}',function($id){
            $project = Project::find($id);
            return view('Admin.projects.edit',compact('project'));
        })->name('project.edit');
        Route::post('/{id}','Admin\AddProjectController@edit')->name('project.edit1');



        Route::get('/mem/{id}',function($id){
            $project = Project::find($id);
            $pro_mem = $project->users()->get(array('name'));
            
            // $pro_mem = $project->users;
            
            return view('Admin.projects.member',compact('pro_mem','id'));
        })->name('project.member');

        Route::get('/del/{mid}/{pid}','Admin\MemberController@delete')->name('member.delete');



        Route::get('/mem-add/{id}',function($id){
            $project = Project::find($id);
            $user = $project->users()->get(array('user_id'));
            $a = array();
            foreach($user as $u)
            {
                array_push($a,$u->user_id);
            }
            // return $a;
            $user =  User::whereNotIn('id',$a)->get();
            
            return view('Admin.projects.add-member',compact('user','project'));
        })->name('member.add');
        Route::get('/add-mem/{id}/{pid}','Admin\MemberController@add')->name('member.add1');
    });
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// User Side Routes

Route::group(['prefix' => 'user','middleware' => ['auth']],function(){
    
    Route::get('/', 'User\UserController@index')->name('user.index');
    Route::get('/manage/{id}','User\UserController@manage')->name('user.manage')->middleware('managetask');
    Route::get('/add/{id}','User\TaskController@add')->name('task.add')->middleware('addtask');
    Route::post('/add-save/{pid}', 'User\TaskController@save')->name('task.save');
    Route::get('/edit/{tid}{pid}','User\TaskController@edit')->name('task.edit')->middleware('edittask');
    Route::post('/edit-save/{tid}','User\TaskController@store')->name('edit.save');
    Route::get('/delete/{tid}{pid}','User\TaskController@delete')->name('task.delete');
});

Route::get('/test',function(){
    $task = Task::find(11);
    return $task->notifications()->get();
});
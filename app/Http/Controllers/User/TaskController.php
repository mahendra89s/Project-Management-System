<?php

namespace App\Http\Controllers\User;

use App\Task;
use Carbon\Carbon;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TaskAddedNotification;

class TaskController extends Controller
{
    public function add($id)
    {
        return view('User.task-add',compact('id'));
    }
    public function save(Request $request,$pid)
    {
        $request->validate([
            'task_title' => 'required|string',
            'task_desc' => 'required|string',
            'date_time' => 'date|nullable'
        ]);
        $uid = Auth::user()->id; 
        
        $task = Task::create([
            'title' => $request->task_title,
            'Task_description' => $request->task_desc,
            'start_date' => $request->date_time,
            'status' => 0,
            'user_id' => $uid ,
            'project_id' => $pid,
        ]);
        Notification::create([
            'message' => 'Added New Task ',
            'user_id' => $uid,
            'task_id' => $task->id,
            'status' => 0,
        ]);
        toastr()->success('Task Added Successfully');
        return redirect()->back();
    }
    public function edit($tid , $pid)
    {   
        $task = Task::findOrFail($tid);
        return view('User.task-edit',compact('task'));
    }
    public function store(Request $request,$tid)
    {
        $compt=NULL;
        $status = 0;
        if(isset($request->completed))
        {
            $compt = Carbon::now();
            $status = 1;
        }
        $request->validate([
            'task_title' => 'required',
            'task_desc' => 'required',
            'date_time' => 'required',
        ]);
        $task = Task::findOrFail($tid);
        $task->update([
            'title' => $request->task_title,
            'Task_description' => $request->task_desc,
            'start_date' => $request->date_time,
            'end_date' => $compt,
            'status' => $status,
        ]);
        Notification::create([
            'message' => 'Updated Task ',
            'user_id' => Auth::id(),
            'task_id' => $tid,
            'status' => 0,
        ]);
        toastr()->success("Updated Successfully");
        return redirect()->back();
    }
    public function delete($tid,$pid)
    {
        $task = Task::findOrFail($tid);
        $task->delete();
        // Notification::create([
        //     'message' => 'Deleted Task ',
        //     'user_id' => Auth::id(),
        //     'task_id' => $tid,
        //     'status' => 0,
        // ]);
        toastr()->error("Deleted Successfully");
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $pid = $user->projects()->get(array('project_id'));
        
        $projects = array();
        foreach($pid as $p)
        {
            $project = Project::where('id','=', $p->project_id)->where('status','=','0')->get();
            if(!$project->isEmpty())
            {
               
                array_push($projects,$project);
            }
            
        }
        // return $projects;
        return view('User.landing',compact('projects'));
        }
        
        public function manage($id)
        {
            $project = Project::findOrFail($id);
            $mem = $project->users()->get(array('name'));
            
            $tasks = $project->tasks()->paginate(5);
            $userid = Auth::id();
            return view('User.task-show',compact('id','mem','tasks','userid'));
        }
}

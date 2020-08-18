<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddProjectController extends Controller
{
    public function add(Request $request){
        Project::create([
            'project_name' => $request->projname,
            'client_name' => $request->cliname,
            'description' => $request->desc,
            'status' => 0,
        ]);
        toastr()->success("Project Added Successfully");
        return redirect()->route('admin.projects');
    }
    public function delete($id){
        $project = Project::findOrFail($id);
        $project->delete();
        toastr()->success("Project Deleted Successfully");
        return redirect()->back();
    }
    public function edit(Request $request,$id){
        $project = Project::findOrFail($id);
        $project->update([
            'project_name' => $request->projname,
            'client_name' => $request->cliname,
            'description' => $request->desc,
            'status' => $request->status,
        ]);
        toastr()->success("Project Updated Successfully");
        return redirect()->route('admin.projects');
    }
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $mem = $project->users()->get(array('name'));
        $task = Task::where('project_id','=',$id)->get();
       
        return view('Admin.projects.project-view',compact('project','mem','task'));
    }
}

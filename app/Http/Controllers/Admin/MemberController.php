<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function add($id,$pid)
    {
        $project = Project::findOrFail($pid);
        $project->users()->syncWithoutDetaching($id);
        toastr()->success('Member Added Successfully');
        return redirect()->back();
    }
    public function delete($mid,$pid)
    {
        $project = Project::findOrFail($pid);
        $project->users()->detach($mid);
        toastr()->success('Member Deleted Successfully');
        return redirect()->back();
    }
}

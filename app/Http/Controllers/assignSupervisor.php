<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\user;
use DB;

class assignSupervisor extends Controller
{
    
    public function assignSupervisor(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'group_id' => 'required|exists:tests,id',
            'supervisor_id' => 'required|exists:users,id',
        ]);

        // Retrieve the group based on the submitted ID
        $group = Test::findOrFail($validatedData['group_id']);

        // Retrieve the supervisor based on the submitted supervisor ID
        $supervisor = User::findOrFail($validatedData['supervisor_id']);

        // Assign the supervisor to the group
        $group->assigned_supervisor_id = $supervisor->id;
        $group->save();

        return redirect()->back()->with('success', 'Supervisor assigned successfully.');
    }
    // assign supervisor 
    public function assignSupervisorView(){
        $groups = Test::all();
        $supervisors = DB::table('users')->where('role','=','supervisor')->get();
        $assignedGroups = Test::with('supervisor')->whereNotNull('assigned_supervisor_id')->get();
        return view('website.pages.assignSupervisor',compact('groups','supervisors','assignedGroups'));
    }
    // update
    public function updateSupervisor(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'group_id' => 'required|exists:tests,id',
            'supervisor_id' => 'required|exists:users,id',
        ]);
    
        // Retrieve the group based on the submitted ID
        $group = Test::findOrFail($validatedData['group_id']);
    
        // Retrieve the supervisor based on the submitted supervisor ID
        $supervisor = User::findOrFail($validatedData['supervisor_id']);
    
        // Assign the supervisor to the group
        $group->assigned_supervisor_id = $supervisor->id;
        $group->save();
    
        return redirect()->back()->with('success', 'Supervisor updated successfully.');
    }

    
    

}
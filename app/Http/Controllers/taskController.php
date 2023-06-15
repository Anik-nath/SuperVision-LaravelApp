<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\taskList;
use App\Models\taskUpdate;
use App\Models\Member;
use App\Models\User;
use App\Models\Test;
use Session;
use Auth;
use DB;


class taskController extends Controller
{
    public function taskStore(Request $request) {
        
        $id = Session::get('id');
        // Validate the form input
        $validatedData = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'due_date' => 'required|date',
            'task_name' => 'required',
            'description' => 'required',
        ]);

        // Create a new task instance
        $task = new taskList();
        $task->group_id = $validatedData['group_id'];
        $task->due_date = $validatedData['due_date'];
        $task->task_name = $validatedData['task_name'];
        $task->description = $validatedData['description'];
        $task->createdBy_id = $id;

        // return $newGroup;
        if($task->save()){
            return  redirect('/assign-task')->with('info', 'task Created successfully');
        }
    }
    public function assignTask(){
        $supervisorId =  Session::get('id');
        $assignedGroups = DB::table('tests')
        ->where('assigned_supervisor_id', $supervisorId)
        ->get();

        $countTask = DB::table('task_lists')->count();
        return view('website.pages.createTask',compact('countTask','assignedGroups')); 
    }

    public function managetask(){
        // $allTask = taskList::all();
        $supervisor = Session::get('id');
        $allTask = DB::Table('task_lists')->select()->where('createdBy_id',$supervisor)->get();  
        return view('website.pages.managetask',compact('allTask')); 
    }
    // public function taskUpdateStore(Request $request){
       
    //     $completedTask = json_encode($request->completed_task);
    //     $student_id = Session::get('id'); //4
    //     $grpid = DB::Table('group_members')->select('group_id')->where('mem_id',$student_id)->get();
    //     $peyci = 0;
    //     foreach($grpid as $key => $value) {
    //         $peyci = $value->group_id;
    //     }
    //     $groupID = $peyci; 
    //     // ---------------------------------//
    //     $grpName = DB::Table('groups')->select('group_name')->where('id',$groupID)->get();
    //     $tempGrpName = '';
    //     foreach($grpName as $key => $value) {
    //         $tempGrpName = $value->group_name;
    //     }
    //     $groupNameValue = $tempGrpName;
        

    //     $data = [
    //         'completed_task' =>$completedTask,
    //         'student_id' =>$student_id,
    //         'group_id' =>$groupID,
    //         'group_name' =>$groupNameValue,
    //     ];
    //     // $updateGroup->is_complete=1;
    //     DB::table('task_updates')->updateOrInsert(['group_name' => $groupNameValue, 'group_id' =>$groupID],$data);
    //     return  redirect()->back()->with('info', 'Graoup Created successfully');

    // }
    public function deleteTask($id){
        $deleted = DB::table('task_lists')->where('id', $id)->delete();
        return redirect('/managetask');
    }
    public function editAllTask($id){
        $allTask = DB::table('task_lists')->where('id','=',$id) ->first();
        return view('website.pages.editTask',['singleTask'=>$allTask]);
    }
    public function updateAllTask(Request $request, $id){
        $due_date = $request->due_date;
        $task_name = $request->task_name;
        $description = $request->description;
        $id = Session::get('id');

        $affected = DB::table('task_lists')
        ->where('createdBy_id', $id)
        ->update([
            'due_date' => $due_date,
            'task_name' => $task_name,
            'description' => $description,
            'createdBy_id' => $id,
        ]);

        if ($affected > 0) {
            return redirect('/managetask')->with('success', 'Tasks updated successfully');
        }
    }
    public function groupTask()
    {
         $stdID = Session::get('username');
        // Retrieve the group ID of the student
         $groupID = DB::table('members')
            ->where('name', $stdID)
            ->value('test_id'); //1
        // Retrieve the supervisor ID of the student's group
         $supervisorID = DB::table('tests')
            ->where('id', $groupID)
            ->value('assigned_supervisor_id'); //3
        // Retrieve the tasks assigned to the supervisor's group
        $allTask = taskList::where('group_id', $groupID)
            ->where('createdBy_id', $supervisorID)
            ->get();

        $completedTasks = DB::table('task_updates')
        ->where('student_id', $stdID)
        ->pluck('is_complete')
        ->map(function ($value) {
            return $value === 1 ? true : false;
        })
        ->toArray();
        
        return view('website.pages.groupTask', compact('allTask','completedTasks'));
    }
    public function taskUpdateStore(Request $request)
    {
        $completedTasks = $request->completed_task;
        $studentId = Session::get('username');

        $groupId = DB::table('members')->where('name', $studentId)->value('test_id');
        $groupName = DB::table('tests')->where('id', $groupId)->value('name');

        // Validate $groupId and $groupName
        if (!$groupId || !$groupName) {
            return redirect()->back()->with('error', 'Invalid group ID or group name.');
        }

        $data = [
            'completed_task' => json_encode($completedTasks),
            'student_id' => $studentId,
            'group_id' => $groupId,
            'group_name' => $groupName
        ];

        DB::table('task_updates')->updateOrInsert(['group_id' => $groupId], $data);

        return redirect()->back()->with('info', 'Task updated successfully');
    }


    
}

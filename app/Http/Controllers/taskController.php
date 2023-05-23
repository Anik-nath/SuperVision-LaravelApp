<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\taskList;
use App\Models\taskUpdate;
use Session;
use DB;


class taskController extends Controller
{
    public function taskStore(Request $request){
       
        $visiting_date = $request->visiting_date;
        $task_name = $request->task_name;
        $description = $request->description;
        $id = Session::get('id');

       
            $newGroup = new taskList();
            $newGroup->visiting_date = $visiting_date;
            $newGroup->task_name = $task_name;
            $newGroup->description = $description;
            $newGroup->createdBy_id = $id;

        // return $newGroup;

        if($newGroup->save()){
            return  redirect('/assign-task')->with('info', 'Graoup Created successfully');
        }
    }
    public function assignTask(){
        $countTask = DB::table('task_lists')->count();
        return view('website.pages.createTask',compact('countTask')); 
    }
    public function managetask(){
        // $allTask = taskList::all();
        $supervisor = Session::get('id');
        $allTask = DB::Table('task_lists')->select()->where('createdBy_id',$supervisor)->get();  
        return view('website.pages.managetask',compact('allTask')); 
    }
    public function groupTask(){
        $allTask = taskList::all();
        return view('website.pages.groupTask',compact('allTask'));
    }
    public function taskUpdateStore(Request $request){
       
        $completedTask = json_encode($request->completed_task);
        $student_id = Session::get('id'); //4
        $grpid = DB::Table('group_members')->select('group_id')->where('mem_id',$student_id)->get();
        $peyci = 0;
        foreach($grpid as $key => $value) {
            $peyci = $value->group_id;
        }
        $groupID = $peyci; 
        // ---------------------------------//
        $grpName = DB::Table('groups')->select('group_name')->where('id',$groupID)->get();
        $tempGrpName = '';
        foreach($grpName as $key => $value) {
            $tempGrpName = $value->group_name;
        }
        $groupNameValue = $tempGrpName;
        // return $groupNameValue;
         // ---------------------------------//
        // $updateGroup = new taskUpdate();
        // $updateGroup->completed_task = $completedTask;
        // $updateGroup->student_id = $student_id;
        // $updateGroup->group_id = $groupID;
        // $updateGroup->group_name = $groupNameValue;
        // return $updateGroup;

        $data = [
            'completed_task' =>$completedTask,
            'student_id' =>$student_id,
            'group_id' =>$groupID,
            'group_name' =>$groupNameValue,
        ];
        // $updateGroup->is_complete=1;
        DB::table('task_updates')->updateOrInsert(['group_name' => $groupNameValue, 'group_id' =>$groupID],$data);
        return  redirect()->back()->with('info', 'Graoup Created successfully');

    }
    public function deleteTask($id){
        $deleted = DB::table('task_lists')->where('id', $id)->delete();
        return redirect('/managetask');
    }
    public function editAllTask($id){
        $allTask = DB::table('task_lists')->where('id','=',$id) ->first();
        return view('website.pages.editTask',['singleTask'=>$allTask]);
    }
    public function updateAllTask(Request $request, $id){
        $visiting_date = $request->visiting_date;
        $task_name = $request->task_name;
        $description = $request->description;
        $id = Session::get('id');

        $affected = DB::table('task_lists')->where('id', $id)->update([
            'visiting_date' => $visiting_date,
            'task_name' => $task_name,
            'description' => $description,
            'createdBy_id' => $id,
          ]);
        return redirect('/managetask');
    }
}

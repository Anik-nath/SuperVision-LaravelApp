<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\group;
use App\Models\taskUpdate;
use App\Models\groupMember;
use Session;
use Auth;
use DB;

class LayoutController extends Controller
{
    public function welcome(){
        return view('website.pages.welcome');
    }
    public function dashboard(){
        $countGroup = DB::table('groups')->count();
        $countSupervisor = DB::table('users')->where('role','=','supervisor')->get()->count();
        $countStudent = DB::table('users')->where('role','=','student')->get()->count();
        $countTask = DB::table('task_lists')->count();
        $allUpdate = taskUpdate::all();
        return view('website.pages.dashboard',compact('countGroup','allUpdate','countTask','countSupervisor','countStudent'));
    }
    public function login(){
        return view('website.pages.login');
    }
    public function register() {
        return view('website.pages.register');
    }
    public function allusers(Request $request) {
        $allUsers = user::all();
        return view('website.pages.allUsers',compact('allUsers'));
    }
    public function groupMemberCreate($id){
        $allgroups = DB::table('groups')->where('id','=',$id) ->first();
        $allstudent = DB::Table('users')->where('role','student')->get();
        return view('website.pages.memberCreate',['singleGroup'=>$allgroups,'users'=>$allstudent]);
    }
    public function groupCreate(){
        return view('website.pages.groupCreate');
    }
    // assign supervisor 
    public function assignSupervisor(){
        $groups = group::all();
        $supervisors = DB::table('users')->where('role','=','supervisor')->get();
        return view('website.pages.assignSupervisor',compact('groups','supervisors'));
    } 

    public function existingGroup() {
        // $allgroups = group::all();
        $supervisor = Session::get('id');
        $allgroups = DB::Table('groups')->select()->where('createdBy_id',$supervisor)->get();
        return view('website.pages.allgroups',compact('allgroups'));
    }
    public function deleteGroup($id){
        $deleted = DB::table('groups')->where('id', $id)->delete();
        // $deleted2 = DB::table('group_members')->where('group_id', $id)->delete();
        return redirect('/groups');
    }

    public function groupStore(Request $request){
        $groupName = $request->group_name;
        $totalMember = $request->total_member;
        $id = Session::get('id');

        $newGroup = new group();
        $newGroup->group_name = $groupName;
        $newGroup->total_member = $totalMember;
        $newGroup->createdBy_id = $id;

        if($newGroup->save()){
            return  redirect('/groups')->with('info', 'Graoup Created successfully');
        }
    }
    public function editAllgroups($id){
        $allgroups = DB::table('groups')->where('id','=',$id) ->first();
        $allstudent = DB::Table('users')->where('role','student')->get();
        return view('website.pages.editAllgroups',['singleGroup'=>$allgroups,'users'=>$allstudent]);
    }
    public function updateAllgroups(Request $request, $id){
        $groupName = $request->group_name;
        $totalMember = $request->total_member;

        $affected = DB::table('groups')->where('id', $id)->update([
            'group_name' => $groupName,
            'total_member' => $totalMember,
          ]);
        return redirect('/groups');
    }
    
    public function storeMembers(Request $request){
        $mem_name = $request->mem_name;
        $mem_id = $request->mem_id;
        $mem_section = $request->mem_section;
        $groupId = $request->group_id;
        $user_id = Session::get('id');
        // return $request->all();
        
        $isExist = groupMember::where([['mem_id',$mem_id],['group_id',$groupId]])->first();
        if(!$isExist){
            for($i=0; $i<count($mem_id); $i++){
                $datasave =[
                    'mem_name' =>$mem_name[$i],
                    'mem_id' =>$mem_id[$i],
                    'mem_section' =>$mem_section[$i],
                    'group_id' =>$groupId,
                    'user_id' =>$user_id,

                ];
                // return $datasave;
                DB::table('group_members')->insert($datasave);
            }
        }
        return redirect()->back()->with('message','division added to the database');
    }
}

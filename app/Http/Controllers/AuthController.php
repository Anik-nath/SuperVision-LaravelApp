<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Session;
use Image;
use DB;

class AuthController extends Controller
{
    public function registerStore(Request $request){
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $confirm_password = $request->confirm;
        $student_id = $request->student_id;
        $role = $request->role;
        // image upload 3
        $pro_pic    = $request->file('pro_pic'); //1
        $filename    = $pro_pic ->getClientOriginalName();
        $pro_pic->move(public_path().'/Profile_pic/',$filename);
        $pro_pic_resize = Image::make(public_path().'/Profile_pic/'.$filename);
        $pro_pic_resize->fit(300, 300);
        
        $newUser = new user();
        $newUser->username = $username;
        $newUser->email = $email;
        $newUser->password = md5($password);
        $newUser->student_id = $student_id;
        $newUser->role = $role;
        $newUser->pro_pic = $filename;//2

        // return $newUser;
        if($newUser->save()){
            return redirect()->back()->with('info', 'Account Created. Waiting for admin approval');
        }
    }

    public function loginStore(Request $request){
        $email = $request->email;
        $password = $request->password; 

        $loggedUser = user::where('email', '=', $email)
            ->where('password', '=', md5($password))
            ->first();
            
        if($loggedUser){
            if($loggedUser->is_approved == 1){
                Session::put('username', $loggedUser->username);
                Session::put('userrole', $loggedUser->role);
                Session::put('id', $loggedUser->id);
                return redirect('dashboard');
            }
            else{
                return redirect()->back()->with('failure', 'Account not yet approved');
            }
        }
    }

    public function logout(Request $request){
        $request->session()->forget(['username','userrole']);
        return redirect('/login');
    }

    public function approve($id){
        $singleuser = user::find($id);
        $singleuser->is_approved=1;
         if($singleuser->save()){
             return redirect('/users');
         }
     }
     public function deleteUser($id){
        $deleted = DB::table('user')->where('id', $id)->delete();
        return redirect('/users');
    }
    public function edit($id){
        $alluser = DB::table('users')->where('id','=',$id) ->first();
        return view('website.pages.edit',['singleUser'=>$alluser]);
    }
    public function update(Request $request, $id){
        $username = $request->username;
        $email = $request->email;
        $student_id = $request->student_id;
        // $password = $request->password;

        $affected = DB::table('users')->where('id', $id)->update([
            'username' => $username,
            'email' => $email,
            'student_id' => $student_id,
            // 'password' =>  md5($password)
          ]);
        return redirect('/users');
    }
    
}

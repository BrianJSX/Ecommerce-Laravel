<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Session;
class UserController extends Controller
{
    public function alluser(){
        $users = User::paginate(10);
        $data['users'] = $users;
        return view('admin.allUser', $data);
    }
    public function adduser(){
        return view('admin.addUser');
    }
    public function edituser($id){
        $checkId = User::where('id', $id)->count();
        if($checkId > 0){
            $user = User::where('id', $id)->first();
            $data['user'] = $user;
            return view('admin.editUser', $data);
        }
        return redirect()->route('alluser');
    }
    public function create(AddUserRequest $request){
        $user = new User();
        if($request->user_password == $request->user_rpassword){
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->phone = $request->user_phone;
            $user->password = bcrypt($request->user_password);
            $user->save();
            return back();
        }else{
            return "not ok";
        }
    }
    public function update(EditUserRequest $request,$id){
        // $password = $request->user_password;
        // $rpassword=  $request->user_rpassword;
        $user = User::find($id);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->phone = $request->user_phone;
        $user->save();
        Session::put('EditUserCorrect', 'Sửa thông tin User thành công');
        return back();
    }

    public function destroy($id){
        $destroy = User::destroy($id);
    }
}

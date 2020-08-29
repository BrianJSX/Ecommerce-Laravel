<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AddUserRequest;

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
    public function create(AddUserRequest $request){
        $user = new User();
        if($request->user_password == $request->user_rpassword){
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->phone = $request->user_phone;
            $user->password = bcrypt($request->user_password);
            $user->save();
            dd($user);
        }else{
            return "not ok";
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\TaskModel;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    public function getUserTask(){
        $users = User::role('staff')->get();
        $data['users'] = $users;
        return view('admin.allUserTask', $data);
    }
    public function getTask($id){
        $user = User::where('id', $id)->count();
        if($user > 0){
            $user = User::where('id', $id)->get();
            $task = User::find($id)->tasks;
            $data['tasks'] = $task;
            $data['users'] = $user;
            // dd($data);
            return view('admin.allTask', $data);
        }
        return redirect()->route('view_user_task');

    }
}

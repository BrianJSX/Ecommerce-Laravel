<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\TaskModel;

class TasksController extends Controller
{
    public function getUserTask(){
        $users = User::role('staff')->get();
        $data['users'] = $users;
        return view('admin.allUserTask', $data);
    }
    public function getTask($id){
        // $tasks = TaskModel::where('user_id', $id)->first();
        // dd($tasks);
        // // $data['tasks'] = $tasks;
        // // return view('admin.allTask', $data);
        return view('admin.allTask');
    }
}

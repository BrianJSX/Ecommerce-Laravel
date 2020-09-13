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
    public function getUserDetailTask($id){
        $checkuser = User::where('id', $id)->count();
        $users = User::where('id', $id)->first();
        $checkrole = $users->hasRole('staff');

        if ($checkuser > 0 && $checkrole) {
            $user = User::where('id', $id)->get();
            $task = User::find($id)->tasks;
            $data['tasks'] = $task;
            $data['users'] = $user;
            // dd($data);
            return view('admin.allUserDetailTask', $data);
        }
        return redirect()->route('view_user_task');
    }

    public function getCreate(){
        $task = TaskModel::all();
        $data['tasks'] = $task;
        return view('admin.addTask', $data);
    }

    public function postCreate(Request $request){
       $job = $request->task_job;
       $address = $request->task_address;
       $money = $request->task_money;
       $day_work = $request->task_day_work;

       $task = new TaskModel();
       $task->job = $job;
       $task->address = $address;
       $task->money = $money;
       $task->day_work = $day_work;
       $task->save();
       return back();
    }

    public function getCreateUserTask($id){
        $checktask = TaskModel::where('id', $id)->count();
        if($checktask > 0){
            $taskIndex = TaskModel::where('id', $id)->first();
            $task =  TaskModel::find($id);
            $user = $task->users;
            $datatask = $user;
            $data['user_task'] = $datatask;
            $data['tasks'] = $taskIndex;
            $data['users'] = User::role('staff')->get();
            return view('admin.addUserTask', $data);
        }
        return redirect()->route('create_task');

    }
    public function postCreateUserTask(Request $request, $id){
        $userId = $request->user_task;
        $task = TaskModel::find($id);
        $task->users()->sync($userId);
        return back();
    }

    public function destroy($id){
        return "ok";
    }
}

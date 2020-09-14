<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\TaskModel;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\UserTaskModel;
use DB;

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
            $userId = User::where('id', $id)->value('id');
            $task = User::find($id)->tasks;

            $data['userId'] = $userId;
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
       Session::put('message', 'Thêm task thành công!!');
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

    public function destroyTask($id){
        $checktask = TaskModel::where('id', $id)->count();
        if($checktask > 0 ){
            Session::put('messageDetroy', 'Xóa Task thành công');
            $task = TaskModel::destroy($id);
            return back();
        }
        Session::put('messageDetroy','Không có id task nào trùng khớp !!');
        return redirect()->route('create_task');
    }

    public function getTaskWork($id, $user){
        $checktask = DB::table('user_task')
                    ->where('task_model_id', $id)
                    ->where('user_id', $user)
                    ->count();
        if($checktask > 0){
            $task = DB::table('user_task')
                    ->where('task_model_id', $id)
                    ->where('user_id', $user)
                    ->update([
                        'status' => '1'
                    ]);
                    return back();
        }
        // return "work";
    }

    public function getTaskNotWork($id, $user){
        $checktask = DB::table('user_task')
                    ->where('task_model_id', $id)
                    ->where('user_id', $user)
                    ->count();
        if($checktask > 0){
        $task = DB::table('user_task')
                ->where('task_model_id', $id)
                ->where('user_id', $user)
                ->update([
                    'status' => '0'
                ]);
            return back();
        }
    }

}

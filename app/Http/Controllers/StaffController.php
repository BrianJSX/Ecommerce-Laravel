<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Carbon;

class StaffController extends Controller
{
    public function staff(){
        return view('staff.stafflogin');
    }

    public function viewDashBoard(){
        $userName = Session::get('staff_name');
        $userId = Session::get('staff_id');
        $now = Carbon::now();
        $monthNow = $now->month;
        $yearNow = $now->year;
        $dayNow = $now->day;

        $salaryMonth = User::find($userId)->tasks()->whereMonth('day_work', $monthNow)->wherePivot('status', 1)->sum('money');
        $salaryYear = User::find($userId)->tasks()->whereYear('day_work', $yearNow)->wherePivot('status', 1)->sum('money');
        $taskUnComplete = User::find($userId)->tasks()->wherePivot('status', 0)->count();
        $taskComplete = User::find($userId)->tasks()->wherePivot('status', 1)->count();

        $task = User::find($userId)->tasks;
        $task_today = User::find($userId)->tasks()->whereDay('day_work', $dayNow)->get();
        $data['user'] = $userName;
        $data['tasks_today'] = $task_today;
        $data['tasks'] = $task;
        $data['salaryMonth'] = $salaryMonth;
        $data['salaryYear'] = $salaryYear;
        $data['taskComplete'] = $taskComplete;
        $data['taskUnComplete'] = $taskUnComplete;
        // dd($data);
        return view('staff.page.dashboard', $data);
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->staff_email, 'password' => $request->staff_password])) {
            $user = Auth::user();
            $checkrole = $user->hasrole(['super_admin', 'admin', 'poster', 'writer']);
            if ($checkrole) {
               Session::put('staffLogin','Vui lòng đăng nhập tại trang Admin');
               return back();
            }
            Session::put('staff_id', $user->id);
            Session::put('staff_name', $user->name);
            return redirect()->route('view_dashboard_staff');
        }
        Session::put('staffLogin', 'Tài khoản hoặc mật khẩu không chính xác');
        return back()->withInput();
    }

     public function logout(){
         $checkSession = Session::has('staff_id');
         if ($checkSession) {
            Session::put('staff_id', Null);
            Session::put('staff_name', Null);
            return Redirect::to('staff');
         }else{
             abort('404');
         }
     }

}

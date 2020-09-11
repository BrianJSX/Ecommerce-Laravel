<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;
use Session;

class StaffController extends Controller
{
    public function staff(){
        return view('staff.stafflogin');
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->staff_email, 'password' => $request->staff_password])) {
            $user = Auth::user();
            $checkrole = $user->hasrole(['super_admin', 'admin', 'poster', 'writer']);
            if ($checkrole) {
               Session::put('stafflogin','Vui lòng đăng nhập tại trang Admin');
               return back();
            }
            return "ok";
        }
        Session::put('stafflogin', 'Tài khoản hoặc mật khẩu không chính xác');
        return back()->withInput();
    }
}

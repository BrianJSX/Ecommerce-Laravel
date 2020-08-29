<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function alluser(){
        $users = User::paginate(2);
        $data['users'] = $users;
        return view('admin.allUser', $data);
    }
}

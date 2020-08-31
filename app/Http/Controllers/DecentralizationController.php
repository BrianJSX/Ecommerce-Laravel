<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleModel;
use App\PermissionModel;

class DecentralizationController extends Controller{
    public function adddecentralization(){
        $users = User::all();
        $roles = RoleModel::all();
        $permissions = PermissionModel::all();

        $data['users'] = $users;
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;

        return view('admin.adddecentralization',$data);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\RoleModel;

class RoleController extends Controller
{
    public function allrole(){
        $roles = RoleModel::all();
        $data['roles'] = $roles;
        // dd($data);
        return view('admin.allRoles',$data);
    }
}

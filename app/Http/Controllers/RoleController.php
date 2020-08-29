<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\RoleModel;
use App\Http\Requests\AddRoleRequest;

class RoleController extends Controller
{
    public function allrole(){
        $roles = RoleModel::paginate(10);
        $data['roles'] = $roles;
        return view('admin.allRoles',$data);
    }
    public function addrole(){
        return view('admin.addRole');
    }
    public function create(AddRoleRequest $request){
        $role = Role::create(['name' => $request->role_name]);
        return back();
    }
}

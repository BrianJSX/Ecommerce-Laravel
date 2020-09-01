<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleModel;
use App\PermissionModel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DecentralizationController extends Controller{
    public function adddecentralization(){
        $roles = RoleModel::all();
        $permissions = PermissionModel::all();

        $data['roles'] = $roles;
        $data['permissions'] = $permissions;

        return view('admin.adddecentralization',$data);
    }
    public function create(Request $request){

        $qrole = $request->Roles_decentralization;
        $qpermission = $request->Permissions_decentralization;

        $role = Role::findByname($qrole);

        $checkrole = $role->hasPermissionTo($qpermission);
        if($checkrole){
            return 'Permission đã có trong Roles';
        }
        return "chưa có";

    }
}

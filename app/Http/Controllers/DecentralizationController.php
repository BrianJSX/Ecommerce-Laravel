<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleModel;
use App\PermissionModel;
use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DecentralizationController extends Controller{
    public function addDecentralization(){
        $roles = RoleModel::all();
        $permissions = PermissionModel::all();

        $data['roles'] = $roles;
        $data['permissions'] = $permissions;

        return view('admin.adddecentralization',$data);
    }

    public function showPermissionOfRole(){
        $permissionOfRole = Role::with('permissions')->get();
        $data['PerWithRoles'] = $permissionOfRole;
        // dd($data);

        return view('admin.allPermissionRole',$data);
    }

    public function create(Request $request){

        $qrole = $request->Roles_decentralization;
        $qpermission = $request->Permissions_decentralization;

        $role = Role::findByname($qrole);

        $checkrole = $role->hasPermissionTo($qpermission);
        if($checkrole){
            Session::put('AddRoleToPermissionError','Permission đã có trong role');
            return back();
        }
            $role->givePermissionTo($qpermission);
            Session::put('AddRoleToPermissionCorrect','Thêm permission vào role thành công');
            return back();
    }
    public function destroy($id){
     return "ok";
    }
}

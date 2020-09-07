<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleModel;
use App\PermissionModel;
use Illuminate\Support\Facades\Auth;
use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DecentralizationController extends Controller{

    public function addRoleOfUser(Request $request){
        $roles = Role::all();
        $users = User::all();
        $data['users'] = $users;
        $data['roles'] = $roles;
        return view('admin.addRolesUser',$data);

    }

    public function addDecentralization(){
        $roles = RoleModel::all();
        $permissions = PermissionModel::all();

        $data['roles'] = $roles;
        $data['permissions'] = $permissions;

        return view('admin.adddecentralization',$data);
    }

    public function allPermissionOfRole(){
        $permissionOfRole = Role::with('permissions')->get();
        $data['PerWithRoles'] = $permissionOfRole;
        // dd($data);
        return view('admin.allPermissionRole',$data);
    }

    public function createPermissionRoles(Request $request){
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
    public function createRoleOfUser(Request $request){
        $id = $request->Users_roles;
        $role = $request->Roles_users;
        $user = User::where('id', $id)->first();
        $checkuser = $user->hasRole($role);
        if($checkuser){
            Session::put('RoleOfUserError','Roles đã tồn tại');
            return back();
        }
            $user->assignRole($role);
            Session::put('RoleOfUserCorrect','Roles đã thêm vào Users');
            return back();
    }

    public function destroy($id){
        return "ok";
    }
}

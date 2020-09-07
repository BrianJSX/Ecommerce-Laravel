<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleModel;
use App\PermissionModel;
use Illuminate\Contracts\Session\Session as SessionSession;
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
    public function revokedPermissionRole(Request $request, $id){
        $qpermission = $request->permission_name;
        $role = Role::where('id', $id)->first();
        $role->revokePermissionTo($qpermission);
        Session::put('RemovePermissionRoleCorrect', 'Xóa permission thành công');
        return back();
    }

    public function revokedRoleUser(Request $request, $id){
        $qrole = $request->role_name;
        $user = User::where('id', $id)->first();
        $user->removeRole($qrole);
        Session::put('removeRoleUser', 'Xóa Roles thành công');
        return back();
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
    public function allRoleOfUser(){
        $users = User::with('roles')->get();
        $data['users'] = $users;
        return view('admin.allRoleUser', $data);
    }

    public function editRolePermission($id){
        $data['role'] = Role::where("id", $id)->first();
        $data['perWithRole'] = Role::where("id", $id)->with("permissions")->first();
        return view('admin.editRolePermission', $data);
    }

    public function editRoleUser($id){
        $checkId = User::where('id', $id)->count();
        if($checkId > 0){
            $data['users'] = User::where('id', $id)->with('roles')->first();
            return view('admin.editRoleUser', $data);
        }
        return redirect()->route('showroleofuser');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\PermissionModel;
use App\Http\Requests\AddPermissionRequest;

class PermissionController extends Controller{
    public function allpermission(){
        $permissions = PermissionModel::paginate(10);
        $data['permissions'] = $permissions;
        return view('admin.allPermission', $data);
    }
    public function addpermission(){
        return view('admin.addPermission');
    }
    public function create(AddPermissionRequest $request){
        $permission = Permission::create(['name' => $request->permission_name]);
        return back();
    }
    public function destroy($id){
        $permission = PermissionModel::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\PermissionModel;
use Session;
use App\Http\Requests\AddPermissionRequest;
use App\Http\Requests\EditPermissionRequest;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller{
    public function allpermission(){
        $permissions = PermissionModel::paginate(10);
        $data['permissions'] = $permissions;
        return view('admin.allPermission', $data);
    }
    public function addpermission(){
        return view('admin.addPermission');
    }
    public function editpermission($id){
        $checkpermission = PermissionModel::where('id', $id)->count();
        if($checkpermission > 0){
            $data['permissions'] = PermissionModel::where('id', $id)->first();
            return view('admin.editPermission', $data);
        }
        return redirect()->route('allpermission');
    }
    public function create(AddPermissionRequest $request){
        $permission = Permission::create(['name' => $request->permission_name]);
        return back();
    }
    public function update(EditPermissionRequest $request, $id){
        $qpermission = $request->permission_name;
        $permission = PermissionModel::find($id);
        $permission->name = $qpermission;
        $permission->save();
        Session::put('editPermissionCorrect', 'Sửa permission thành công');
        return back();
    }
    public function destroy($id){
        $permission = PermissionModel::destroy($id);
    }
}

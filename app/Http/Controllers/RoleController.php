<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\RoleModel;
use Session;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\EditRoleRequest;
use Illuminate\Support\Facades\Redirect;

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

    public function update(EditRoleRequest $request, $id){
        $role_name = $request->role_name;
        $role = RoleModel::find($id);
        $role->name = $role_name;
        $role->save();
        Session::put('editRoleCorrect','Sửa tên role thành công');
        return back();
    }

    public function editrole($id){
        $roles = Role::where('id', $id)->count();
        if($roles > 0){
            $data['roles'] = Role::where('id', $id)->first();
            return view('admin.editRole', $data);
        }
        return redirect('admin/role');
    }

    public function detroy($id){
        $detroy = RoleModel::destroy($id);
    }
}

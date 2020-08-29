<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\PermissionModel;

class PermissionController extends Controller
{
    public function allpermission(){
        $permissions = PermissionModel::paginate(10);
        $data['permissions'] = $permissions;
        return view('admin.allPermission', $data);
    }
}

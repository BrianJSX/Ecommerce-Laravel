<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // function allPermissions() {
    //     $permissions = [];
    //     foreach ($this->roles as $role) {
    //         foreach($role->permissions->all() as $permission) {
    //             $exists = false;
    //             foreach($permissions as $_permission) {
    //                 if($permission->id == $_permission->id) {
    //                     $exists = true;
    //                     break;
    //                 }
    //             }
    //             if(!$exists) {
    //                 $permissions[] = $permission;
    //             }
    //         }
    //     }
    //     return $permissions;
    // }
}

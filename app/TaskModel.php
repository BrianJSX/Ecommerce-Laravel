<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_task');
    }
}

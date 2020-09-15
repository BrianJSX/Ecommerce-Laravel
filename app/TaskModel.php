<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $casts = [
        'day_work' => 'datetime:d-m-Y',

    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_task')->using('App\UserTaskModel')
                                                            ->withPivot([
                                                                'status',
                                                                'day_off',
                                                            ]);
    }
}

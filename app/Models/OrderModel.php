<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'tbl_order'; 
    protected $primaryKey = 'order_id';
}

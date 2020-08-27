<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'tbl_news'; 
    protected $primaryKey = 'news_id';
    public function getRouteKeyName(){
        return 'news_title';
   }

}

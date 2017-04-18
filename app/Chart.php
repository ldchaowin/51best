<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    //



    /**
     * 获取一个榜单的子元素
    */

    public function subcategory(){
        return $this->belongsTo('App\Subcategory','class');
    }

    /**
     * 一个榜单有多个用户喜欢
     */

    public function users(){
        return $this->belongsToMany('App\User','likes','chart_id','user_id');
    }



}

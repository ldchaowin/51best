<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    //
    use SoftDeletes;

    protected  $table = 'likes';

    protected $dates = ['deleted_at'];


    protected $fillable = ['chart_id', 'user_id'];
    
}

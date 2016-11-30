<?php

namespace App;


use Illuminate\Database\Eloquent\Model;



class Subcategory extends Model
{
    //
    protected $table = 'subcategories';

    public function category() {
        return $this->belongsTo('App\Category', 'f_id');
    }


}

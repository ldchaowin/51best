<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    //

public function subcategory(){
    return $this->belongsTo('App\Subcategory','class');
}


}

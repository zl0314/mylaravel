<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = [];

    public function articles ()
    {
        return $this->hasMany( 'App\Model\Article', 'category_id' );
    }
}

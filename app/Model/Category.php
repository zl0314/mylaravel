<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = [];

    public function article (  )
    {
        return $this->belongsTo('App\Article', 'category_id');
    }
}

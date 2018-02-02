<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function articles ()
    {
        return $this->morphedByMany( 'App\Model\Article', 'tagable' );
    }
}

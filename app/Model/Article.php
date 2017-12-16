<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded = [];

    public function scopeTitle ( $query, $title )
    {
        if ( !empty( $title ) ) {
            return $query->where( 'title', 'like', '%' . $title . '%' );
        }
    }

    public function category(){
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
}

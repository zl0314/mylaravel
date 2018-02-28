<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Model\Tag;


class TagController extends FrontController
{
    public function show ( $id )
    {
        $tag = Tag::findOrFail( $id );

        $vars = [
            'item' => $tag,
        ];
        $this->assign( $vars );
        return $this->display();
    }
}

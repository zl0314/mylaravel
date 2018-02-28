<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;

class CategoryController extends FrontController
{

    public function show ( $id )
    {
        $category = Category::findOrFail( $id );
        $vars = [
            'item' => $category,
        ];
        $this->assign( $vars );

        return $this->display();
    }
}

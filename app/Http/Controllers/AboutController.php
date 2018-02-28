<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\DB;

class AboutController extends FrontController
{
    public function index ()
    {

        $about = DB::table( 'about' )->where( [ 'id' => 1 ] )->first();
        $vars = [
            'about' => $about,
        ];

        $this->assign( $vars );

        return $this->display();
    }
}

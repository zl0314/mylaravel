<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Redis;

class FrontController extends CommonController
{

    /**
     * FrontController constructor.
     */
    public function __construct ()
    {
        parent::__construct();

        $path = request()->path();
        $pathArr = explode( '/', $path );

        $siteClass = !empty($pathArr[0]) ? $pathArr[0] : 'index';
        $id = ( !empty( $pathArr[1] ) && is_numeric( $pathArr[1] ) ) ? $pathArr[1] : '0';
        $siteMethod = !empty( $id ) ? ( !empty( $pathArr[2] ) ? $pathArr[2] : 'show' ) : ( !empty( $pathArr[1] ) ? $pathArr[1] : 'index' );

        $this->siteMethod = $siteMethod;
        $this->siteClass = $siteClass;
        $this->id = $id;

        $vars = [
            'siteMethod' => $siteMethod,
            'siteClass'  => $siteClass,
        ];
        $this->assign( $vars );

        $webset = Redis::get( 'setting' );
        $this->viewData['webset'] = json_decode( $webset );
    }

    /**
     * @param        $data
     * @param string $template
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display ( $data = '', $template = '' )
    {
        $template = $template ? $template : 'web.' . $this->siteClass . '.' . $this->siteMethod;
        if ( !empty( $data ) ) {
            $this->assign( $data );
        }
        return view( $template, $this->viewData );
    }

}

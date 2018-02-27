<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends CommonController
{

    public function __construct ()
    {
        parent::__construct();
        $path = request()->path();
        $pathArr = explode( '/', $path );

        $siteClass = !empty( $pathArr[1] ) ? $pathArr[1] : 'index';
        $id = ( !empty( $pathArr[2] ) && is_numeric( $pathArr[2] ) ) ? $pathArr[1] : '';
        $siteMethod = !empty( $id ) ? ( !empty( $pathArr[3] ) ? $pathArr[3] : '' ) : ( !empty( $pathArr[2] ) ? $pathArr[2] : 'index' );

        $this->siteMethod = $siteMethod;
        $this->siteClass = $siteClass;
        $this->id = $id;

        $vars = [
            'siteMethod' => $siteMethod,
            'siteClass'  => $siteClass,
        ];
        $this->assign( $vars );
    }

    /**
     * @param        $data
     * @param string $template
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display ( $data = '', $template = '' )
    {
        $template = $template ? $template : 'admin.' . $this->siteClass . '.' . $this->siteMethod;
        if ( !empty( $data ) ) {
            $this->assign( $data );
        }

        return view( $template, $this->viewData );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    //站点控制器
    public $siteClass;
    //站点方法（控制器内的就去）
    public $siteMethod;
    //主键
    public $id;

    //给模板要赋予的值
    public $viewData = null;

    public function __construct ()
    {
        $path = request()->path();
        $pathArr = explode( '/', $path );

        $siteClass = $pathArr[1];
        $id = ( !empty( $pathArr[2] ) && is_numeric( $pathArr[2] ) ) ? $pathArr[2] : '';
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

    /** 给模板赋值
     *
     * @param        $key
     * @param string $value
     */
    public function assign ( $key, $value = '' )
    {
        if ( is_array( $key ) ) {
            foreach ( $key as $k => $r ) {
                if ( !empty( $k ) ) {
                    $this->assign( $k, $r );
                }
            }
        } else {
            $this->viewData[ $key ] = $value;
        }
    }

}

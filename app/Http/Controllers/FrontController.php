<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Redis;

class FrontController extends CommonController
{
    /**
     * 站点设置信息
     * @var array|mixed
     */
    public $webset = [];

    /**
     * FrontController constructor.
     */
    public function __construct ()
    {
        $webset = Redis::get( 'setting' );
        $this->webset = json_decode( $webset );
        parent::__construct();
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

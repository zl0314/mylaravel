<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends CommonController
{


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

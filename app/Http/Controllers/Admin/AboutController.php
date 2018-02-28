<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BackController;
use Illuminate\Support\Facades\DB;

class AboutController extends BackController
{
    /**
     * SettingController constructor.
     */
    public function __construct ()
    {
        parent::__construct();
        $this->assign( 'here', '系统设置' );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $data = Db::table( 'about' )->where( [ 'id' => 1 ] )->first();
        $vars = [];
        if ( !empty( $data ) ) {
            $vars = [
                'about' => $data,
            ];
        }

        return $this->display( $vars );
    }

    /**
     * @param Request $request
     */
    public function store ( Request $request )
    {
        $data = $request->post( 'data' );
        $about = DB::table( 'about' )->where( [ 'id' => 1 ] )->first();


        if ( empty( $about ) ) {
            DB::table( 'about' )->insert( [ 'content' => $data['content'] ] );
        } else {
            DB::table( 'about' )->where( [ 'id' => 1 ] )->update( [ 'content' => $data['content'] ] );
        }

        flash()->success( '保存成功' );
        return redirect( url( 'admin/about' ) );
    }

}

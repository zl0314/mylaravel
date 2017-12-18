<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BackController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SettingController extends BackController
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
        $setting = Db::table( 'setting' )->where( [ 'id' => 1 ] )->first();
        $vars = [];
        if(!empty($setting['setting'])){
            $vars = [
                'setting' => json_decode( $setting->setting ),
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
        $setting = DB::table( 'setting' )->where( [ 'id' => 1 ] )->first();

        $insert_data = json_encode( $data );

        if ( empty( $setting ) ) {
            DB::table( 'setting' )->insert( [ 'setting' => $insert_data ] );
        } else {
            DB::table( 'setting' )->where( [ 'id' => 1 ] )->update( [ 'setting' => $insert_data ] );
        }


        Redis::set( 'setting', $insert_data );

        flash()->success( '保存成功' );

        return redirect( url( 'admin/setting' ) );
    }
}

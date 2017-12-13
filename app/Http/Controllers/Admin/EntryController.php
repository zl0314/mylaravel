<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use App\Http\Requests\AdminProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EntryController extends Controller
{

    public function __construct ()
    {
        $this->middleware( 'admin.auth', [
            'except' => [ 'login', 'dologin', 'code' ],
        ] );
    }

    /**
     * 后台首页
     */
    public function index ()
    {
        return view( 'admin.entry.index' );
    }

    /**
     * 修改密码表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function my ()
    {
        return view( 'admin.entry.my' );
    }


    public function updateInfo ( AdminProfile $request )
    {
        echo '12';
    }

    public function chpassForm ()
    {
        return view( 'admin.entry.chpass' );
    }

    /**
     * 修改密码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword ( AdminPost $request )
    {
        echo '23';
    }

    /** 系统 信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info ()
    {
        return view( 'admin.entry.info' );
    }

    /**管理员退出
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function quite ()
    {
        Auth::guard( 'admin' )->logout();

        return redirect( '/admin/login' );
    }

    /**
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login ()
    {
        $data = [
        ];

        return view( 'admin.entry.login', $data );
    }

    /**
     * 登录确认页面
     */
    public function dologin ( Request $request )
    {
        $userCaptcha = $request->input( 'captcha' );
        $sessionCaptcha = Session( 'captcha' );

        if ( $userCaptcha && strtolower( $userCaptcha ) == strtolower( $sessionCaptcha ) ) {
            $status = Auth::guard( 'admin' )->attempt( [
                'username' => $request->input( 'username' ),
                'password' => $request->input( 'password' ),
            ] );
            if ( $status ) {
                return redirect( '/admin/index' );
            } else {
                return redirect( '/admin/login' )->with( 'msg', '登录失败，请重试' );
            }
        } else {
            Session::flash( 'msg', '验证码输入错误' );

            return view( 'admin.entry.login' );
        }
    }

    /**
     * 获取验证码
     */
    public function code ( $random )
    {
        $builder = new CaptchaBuilder();
        $builder->build( 150, 32 );
        $phrase = $builder->getPhrase();
        session( [ 'captcha' => $phrase ] ); //存储验证码
        ob_clean(); //清除缓存

        return response( $builder->output() )->header( 'Content-type', 'image/jpeg' ); //把验证码数据以jpeg图片的格式输出
    }
}

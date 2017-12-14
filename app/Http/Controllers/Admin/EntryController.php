<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use App\Http\Requests\AdminProfile as AdminProfilePost;
use App\Model\AdminProfile;
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
        $admin_id = Auth::guard( 'admin' )->user()->id;
        $user = AdminProfile::where( 'admin_id', '=', $admin_id )->first();

        return view( 'admin.entry.my', [
            'user' => $user,
        ] );
    }


    public function updateInfo ( AdminProfilePost $request )
    {
        $model = new AdminProfile;
        //先查找有没有当前管理员的个人信息记录
        $admin_id = Auth::guard( 'admin' )->user()->id;
        $admin_row = $model->where( 'admin_id', '=', $admin_id )->first();

        $model->realname = $request['realname'];
        $model->birthday = $request['birthday'];
        $model->email = $request['email'];
        $model->mobile = $request['mobile'];
        $model->headimg = $request['headimg'];
        $model->admin_id = $admin_id;

        if ( !empty( $admin_row ) ) {
            $res = $model->update();
        } else {
            $res = $model->save();
        }

        if ( $res ) {
            flash()->success( '信息保存成功' )->overlay();
        } else {
            flash()->error( '信息保存失败' )->overlay();
        }

        return redirect( '/admin/my' );
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
        $model = Auth::guard( 'admin' )->user();
        $model->password = bcrypt( $request->password );
        $model->save();

        flash()->success( '密码修改成功' )->overlay();

        return redirect( 'admin/chpass' );
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
        return view( 'admin.entry.login' );
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

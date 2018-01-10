@extends('layouts.master')

@section('content')
    <!--头部 开始-->
    <div class="top_box">
        <div class="top_left">
            <div class="logo">后台管理模板</div>
            <ul>
                <li><a href="javascript:;" class="active">首页</a></li>
                {{--<li><a href="javascript:;">管理页</a></li>--}}
            </ul>
        </div>
        <div class="top_right">
            <ul>
                <li>管理员：
                        {{Auth::guard('admin')->user()->username}}
                </li>
                <li>
                    <a href="{{url('/admin/my')}}" target="main">
                        我的资料
                    </a>
                </li>
                <li><a href="{{url('admin/chpass')}}" target="main">修改密码</a></li>
                <li><a href="{{url('admin/quite')}}">退出</a></li>
            </ul>
        </div>
    </div>
    <!--头部 结束-->

    <!--左侧导航 开始-->
    <div class="menu_box">
        <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章管理</a></li>
                    <li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章分类</a>
                    <li><a href="{{url('admin/tag')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>标签管理</a>
                    </li>
                </ul>
            </li>
            <li>
                <h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/setting')}}" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--左侧导航 结束-->

    <!--主体部分 开始-->
    <div class="main_box">
        <iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
    </div>
    <!--主体部分 结束-->

    <!--底部 开始-->
    <div class="bottom_box">
        CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
    </div>
    <!--底部 结束-->
@endsection



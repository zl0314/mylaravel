<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$webset->site_title??''}}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{$webset->keywords??''}}"/>
    <meta name="description" content="{{$webset->description??''}}"/>
    <link href="/web/css/base.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/web/js/modernizr.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('/zl/js/jquery.js')}}"></script>

</head>
<body>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav">
        <a href="/" @if($siteClass == 'index')id="topnav_current" @endif><span>首页</span><span class="en">Protal</span></a>
        <a href="/article" @if($siteClass == 'article')id="topnav_current" @endif><span>文章</span><span class="en">Article</span></a>
        <a href="/about" @if($siteClass == 'about')id="topnav_current" @endif><span>关于我</span><span class="en">About</span></a>
        <a href="/message" @if($siteClass == 'message')id="topnav_current" @endif><span>留言版</span><span class="en">Gustbook</span></a>
    </nav>
</header>

<script>
    $.ajaxSetup({
        headers: { // 默认添加请求头
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
    });
</script>


@yield('content')
<footer>
    <p>Design by zlong.xin <a href="http://zlong.xin/" target="_blank">zlong.xin</a></p>
</footer>
<script src="/web/js/silder.js"></script>
</body>
</html>

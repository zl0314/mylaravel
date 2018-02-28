@extends('layouts.web.master')


@section('content')
    <link href="/web/css/style.css" rel="stylesheet">

    <article class="blogs">
        <h1 class="t_nav"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span>

            <a href="/" class="n1">返回首页</a>
        </h1>
        <div class="newblog left">
            @foreach($articles as $k => $r)
                <h2>{{$r->title}}</h2>
                <p class="dateview"><span>发布时间：{{date('Y-m-d', strtotime($r->created_at))}}</span><span>分类：[<a
                                href="/category/{{$r->category->id}}">{{$r->category->name}}</a>]</span>
                </p>
                <figure><img src="{{$r->thumb??'/web/images/001.png'}}"></figure>
                <ul class="nlist">
                    <p>{{$r->intro}}</p>
                    <a title="{{$r->title}}" href="/article/{{$r->id}}" class="readmore">阅读全文>></a>
                </ul>
                <div class="line"></div>
            @endforeach

            <div class="blank"></div>
            <div class="page">
                <ul class="pagination">
                    {!! $articles->links() !!}
                </ul>


            </div>
        </div>
        <aside class="right">
            <div class="rnav">
                <ul>
                    @foreach($category as $k => $r)
                        <li class="rnav4"><a href="/category/{{$r->id}}" >{{$r->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="news">
                @include('web.click_latest')
            </div>
            <div class="visitors">
                <h3><p>最近访客</p></h3>
                <ul>

                </ul>
            </div>
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a
                        class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span
                        class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
            </script>
            <!-- Baidu Button END -->
        </aside>
    </article>


@endsection
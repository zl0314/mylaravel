@extends('layouts.web.master')

@section('content')
    <article>
        <h2 class="title_tj">
            <p>文章<span>推荐</span></p>
        </h2>
        <div class="bloglist left">
            @foreach($article as $k => $r)

            <h3>{{$r->title}}</h3>
            <figure><img src="{{$r->thumb}}"></figure>
            <ul>
                <p>{{$r->intro}}</p>
                <a title="{{$r->title}}" href="article/{{$r->id}}"  class="readmore">阅读全文>></a>
            </ul>
            <p class="dateview"><span>{{date('Y-m-d', strtotime($r->created_at))}}</span><span></span></p>

            @endforeach
        </div>
        <aside class="right">
            <div class="weather">
                <iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true"
                        src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1">
                </iframe>
            </div>


            <div class="news">
                @include('web.click_latest')
                <h3 class="links">
                    <p>友情<span>链接</span></p>
                </h3>
                <ul class="website">
                    @foreach($fd as $k => $r)
                        <li><a href="{{$r->url}}">{{$r->name}}</a></li>
                    @endforeach
                </ul>
            </div>


            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
                <a class="bds_tsina"></a>
                <a class="bds_qzone"></a>
                <a class="bds_tqq"></a>
                <a class="bds_renren"></a>
                <span class="bds_more"></span><a class="shareCount"></a>
            </div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
            </script>
            <!-- Baidu Button END -->

        </aside>
    </article>
@endsection
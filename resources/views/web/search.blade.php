<link href="/web/css/index.css" rel="stylesheet">

<article>
    <h2 class="title_tj">
        <p style="width:220px;">【<span>{{$item->name}}</span>】相关的文章</p>
    </h2>
    <div class="bloglist " style="width:100%;background:none;">
        @foreach($item->articles as $k => $r)
            <h3>{{$r->title}}</h3>
            <figure style="margin-right:13px;"><img src="{{$r->thumb??'/web/images/001.png'}}"></figure>
            <ul style="width:83%;float:none;">
                <p>{{$r->intro}}</p>
                <a title="{{$r->title}}" href="/article/{{$r->id}}"  class="readmore">阅读全文>></a>
            </ul>
            <p class="dateview" style="width:100%;"><span>{{date('Y-m-d', strtotime($r->created_at))}}</span><span></span></p>

        @endforeach
    </div>

</article>
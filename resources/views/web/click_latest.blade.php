
<h3>
    <p>栏目<span>最新</span></p>
</h3>

<ul class="rank" id="rank">
    {{--<li><a href="url" title="title" target="_blank">title</a></li>--}}
</ul>

<h3 class="ph">
    <p>点击<span>排行</span></p>
</h3>

<ul class="paih" id="click">
    {{--<li><a href="url" title="title" target="_blank">title</a></li>--}}
</ul>

<script>
$.get('{{url('/getrank')}}', { }, function (res) {
    var latest = res.latest;
    var click = res.click;

    var latest_html = '';
    for(l in latest){
        latest_html += '<li><a href="/article/'+latest[l].id+'" title="'+latest[l].title+'" >'+latest[l].title+'</a></li>';
    }

    var click_html = '';
    for(c in click){
        click_html += '<li><a href="/article/'+click[c].id+'" title="'+click[c].title+'" >'+click[c].title+'</a></li>';
    }

    $('#rank').html(latest_html);
    $('#click').html(click_html);

});
</script>
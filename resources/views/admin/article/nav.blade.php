<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 10px;">
    <li @if($siteMethod == 'index') class="active" @endif ><a href="{{url('admin/article')}}">文章列表</a>
    </li>
    <li @if($siteMethod == 'create' || $siteMethod == 'edit') class="active" @endif >
        @if($siteMethod == 'index' || $siteMethod == 'create')
            <a href="{{url('admin/article/create')}}">
                文章添加
            </a>
        @else
            <a href="javascript:;">文章编辑</a>
        @endif
    </li>
</ul>
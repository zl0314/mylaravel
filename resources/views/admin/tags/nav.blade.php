<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" style="margin-bottom:15px;">
    <li @if(request()->path() == 'admin/tag') class="active" @endif ><a href="{{url('/admin/tag')}}">标签列表</a></li>

    @if(request()->path() == 'admin/tag/create' || request()->path() == 'admin/tag' )
        <li class="active">
            <a href="{{url('/admin/tag/create')}}">标签添加</a></li>
    @endif

    @if(strpos(request()->path(), 'edit') )
        <li class="active">
            <a href="{{url('/admin/tag/create')}}">标签编辑</a></li>
    @endif
</ul>
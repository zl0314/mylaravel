<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 10px;">
    <li @if($siteMethod == 'index') class="active" @endif ><a href="{{url('admin/friend_link')}}"> 友情链接列表</a>
    </li>
    <li @if($siteMethod == 'create' || $siteMethod == 'edit') class="active" @endif >
        @if($siteMethod == 'index' || $siteMethod == 'create')
            <a href="{{url('admin/friend_link/create')}}">
                友情链接添加
            </a>
        @else
            <a href="javascript:;">友情链接编辑</a>
        @endif
    </li>
</ul>
<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 10px;">
    <li @if($siteMethod == 'index') class="active" @endif ><a href="{{url('admin/category')}}">文章分类列表</a>
    </li>
    <li @if($siteMethod == 'create' || $siteMethod == 'edit') class="active" @endif >
        @if($siteMethod == 'index' || $siteMethod == 'create')
            <a href="{{url('admin/category/create')}}">
                文章分类添加
            </a>
        @else
            <a href="javascript:;">文章分类编辑</a>
        @endif
    </li>
</ul>
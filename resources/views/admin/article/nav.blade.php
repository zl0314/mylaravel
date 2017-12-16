<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" role="tablist">
    <li @if(request()->path() == 'admin/article') class="active" @endif ><a href="{{url('admin/article')}}">文章列表</a>
    </li>
    <li @if(request()->path() == 'admin/article/create') class="active" @endif ><a
                href="{{url('admin/article/create')}}">文章添加</a>
    </li>
</ul>
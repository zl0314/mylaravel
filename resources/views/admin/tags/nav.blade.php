<!-- TAB NAVIGATION -->

<ul class="nav nav-tabs" style="margin-bottom:15px;">
    <li  @if(request()->path() == 'admin/tag') class="active" @endif ><a href="{{url('/admin/tag')}}" >标签列表</a></li>
    <li  @if(request()->path() == 'admin/tag/create') class="active" @endif ><a href="{{url('/admin/tag/create')}}" >标签添加</a></li>
</ul>
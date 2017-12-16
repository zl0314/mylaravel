<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" style="margin-bottom:15px;">
    <li  @if(request()->path() == 'admin/category') class="active" @endif ><a href="{{url('/admin/category')}}" >文章分类列表</a></li>
    <li  @if(request()->path() == 'admin/category/create') class="active" @endif ><a href="{{url('/admin/category/create')}}" >文章分类添加</a></li>
</ul>
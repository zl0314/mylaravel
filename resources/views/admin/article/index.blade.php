@extends('layouts.master')
@section('content')

    @include('admin.article.nav')
    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap" style="margin-bottom:10px;">
        <form action="" method="get">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select name="category_id">
                            <option value="">全部</option>
                            @foreach(App\Model\Category::get() as $r)
                                <option value="{{$r->id}}"
                                        @if(request()->get('category_id') == $r->id) selected @endif>{{$r->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <th width="70">标题:</th>
                    <td><input type="text" name="title" value="{{request()->get('title')}}" placeholder="关键字"></td>
                    <td><input type="submit" class="btn btn-primary" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">文章管理</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>标题</th>
                    <th>分类 </th>
                    <th>SEOURL</th>
                    <th>发布时间</th>
                    <th>状态</th>
                    <th>推荐到首页</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($data))
                    @foreach($data as $k => $item)
                        <tr id="item_{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->seourl}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>@if(!empty($item->deleted_at)) 软删除 @else 正常 @endif</td>
                            <td>@if(!empty($item->recommend_to_index)) 是 @else 否 @endif</td>
                            <td>
                                <div class="btn-group">
                                    <a  href="{{url('/admin/article/' . $item->id . '/edit')}}" class="btn btn-default">编辑</a>
                                    <a   class="btn btn-default" onclick="del('{{$item->id}}')">删除
                                    </a>
                                    @if(!empty($item->deleted_at))
                                        <button type="button" class="btn btn-default">恢复</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @else

                    <tr>
                        <td colspan="6">好吧， 暂时没有数据 。。</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection()
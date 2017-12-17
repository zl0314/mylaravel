@extends('layouts.master')

@section('content')

    @include('admin.category.nav')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">文章分类管理</h3>
        </div>
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>名称</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($data))
                    @foreach($data as $item)
                        <tr id="item_{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="{{url('/admin/category/'.$item->id.'/edit')}}">编辑</a>
                                    <a class="btn btn-default" href="javascript:;"
                                       onclick="del('{{$item->id}}')">删除 </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4">好吧， 暂时没有任何数据。。</td>
                    </tr>
                @endif
                </tbody>
            </table>

            <ul class="pagination">
                {!! $data->links() !!}
            </ul>
        </div>
    </div>
@endsection()
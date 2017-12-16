@extends('layouts.master')

@section('content')
    @include('admin.category.nav')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">文章分类管理</h3>
        </div>
        <div class="panel-body">
            <form action="/admin/category" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">文章分类名称 </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="输入文章分类名" >
                </div>

                <button type="submit" class="btn btn-primary">保存数据 </button>
            </form>
        </div>
    </div>
@endsection()
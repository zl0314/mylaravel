@extends('layouts.master')

@section('content')
    @include('admin.friend_link.nav')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">友情链接管理</h3>
        </div>
        <div class="panel-body">
            <form action="/admin/friend_link/{{$model->id}}" method="post" >

                {{csrf_field()}}
                <div class="form-group">
                    <label for="">名称 </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="输入名称" >
                </div>
                <div class="form-group">
                    <label for="">URL </label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="输入URL" >
                </div>
                <div class="form-group">
                    <label for="">排序 </label>
                    <input type="text" class="form-control" name="listorder" id="listorder" placeholder="排序，越大越靠前" >
                </div>


                <button type="submit" class="btn btn-primary">保存数据 </button>
            </form>
        </div>
    </div>
@endsection()
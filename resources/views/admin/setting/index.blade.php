@extends('layouts.master')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">系统设置</h3>
        </div>
        <div class="panel-body">
            <form action="{{url('admin/setting')}}" method="post" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="">站点名称</label>
                    <input type="text" class="form-control" value="{{$setting->site_title??''}}" name="data[site_title]"
                           id="" placeholder="请输入站点名称">
                </div>
                <div class="form-group">
                    <label for="">关键字描述</label>
                    <input type="text" class="form-control" value="{{$setting->keywords??''}}"name="data[keywords]" id="" placeholder="关键字描述，用于网站优化">
                </div>
                <div class="form-group">
                    <label for="">描述信息</label>
                    <input type="text" class="form-control" value="{{$setting->description??''}}" name="data[description]" id="" placeholder="描述信息，用于网站优化">
                </div>
                <div class="form-group">
                    <label for="">站长邮箱</label>
                    <input type="text" class="form-control"  value="{{$setting->email??''}}"name="data[email]" id="" placeholder="请输入站长邮箱">
                </div>

                <button type="submit" class="btn btn-primary">保存设置</button>
            </form>
        </div>
    </div>

@endsection
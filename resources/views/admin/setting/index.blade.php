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

                <div class="form-group">
                    <label for="">站长邮箱首页Banner：</label>
                        <input id="index_banner" type="hidden" name="data[index_banner]" value="{{$setting->index_banner??''}}"
                               class="input-txt"/>
                        <input type="button" class="ajaxUploadBtn btn-primary btn" id="index_banner_button"
                               onclick="ajaxUpload('index_banner','index_banner')"
                               value="上传图片">
                        <small id="fileHelpId" class="form-text text-muted">JPG，PNG，GIF 格式图片,大小1900*260</small>
                    <br><img style="height:100px;padding:5px;" src="{{$setting->index_banner??'/zl/img/default_upload.jpg'}}" alt="" id="index_banner_pic">
                </div>

                <div class="form-group">
                    <label for="">首页Banner上文字内容</label>
                    <textarea style="height:120px;" name="data[banner_intro]" placeholder="请输入内容" >{{$setting->banner_intro??''}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">保存设置</button>
            </form>
        </div>
    </div>
    @include('layouts.ajaxupload')
@endsection
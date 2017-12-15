@extends('layouts.master')

@section('content')
    <script src="/zl/js/WdatePicker.js"></script>
    <script src="/zl/js/ajaxupload.3.9.js"></script>
    <form action="{{url('/admin/my')}}" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">我的资料</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="真实姓名" class="col-sm-1 control-label">真实姓名</label>
                    <div class="col-sm-10">
                        <input type="text" name="realname"  value="{{$user->realname}}" class="form-control" id="realname" placeholder="真实姓名">
                    </div>
                </div>

                <div class="form-group">
                    <label for="生日" class="col-sm-1 control-label">生日</label>
                    <div class="col-sm-10">
                        <input size="16" type="text" onclick="WdatePicker()" name="birthday" value="{{$user->birthday}}" readonly
                               class="form_datetime " id="form_datetime">
                    </div>
                </div>
                <div class="form-group">
                    <label for="邮箱" class="col-sm-1 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input size="16" type="text" name="email" value="{{$user->email}}" class="form-control" id="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="联系方式" class="col-sm-1 control-label">联系方式</label>
                    <div class="col-sm-10">
                        <input size="16" type="text" name="mobile" value="{{$user->mobile}}" class="form-control" id="mobile">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-1 control-label">头像</label>
                    <input id="headimg" type="text" name="headimg" value="{{$user->headimg}}" class="input-txt"/>
                    <input type="button" class="ajaxUploadBtn" id="headimg_button"
                           onclick="ajaxUpload('headimg','headimg')"
                           value="上传图片" >
                    <small id="fileHelpId" class="form-text text-muted">JPG，PNG，GIF 格式图片,大小100*100</small>
                    <br>
                    <br>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <a href="javascript:;" class="thumbnail">
                            <img src="@if( $user->headimg){{$user->headimg}}@else /zl/img/default_head.jpg @endif" alt="" id="headimg_pic" width="100" height="100" >
                        </a>
                    </div>

                </div>


                {{--<input type="submit" value="保存修改" class="btn btn-primary">--}}
                <button type="submit" class="btn btn-primary">保存修改</button>
            </div>
        </div>

    </form>
@endsection
@extends('layouts.master')

@section('content')
    <script src="/zl/js/WdatePicker.js"></script>

    <form action="{{url('/admin/my')}}" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">我的资料</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="真实姓名" class="col-sm-1 control-label">真实姓名</label>
                    <div class="col-sm-10">
                        <input type="text" name="realname" class="form-control" id="realname" placeholder="真实姓名">
                    </div>
                </div>

                <div class="form-group">
                    <label for="生日" class="col-sm-1 control-label">生日</label>
                    <div class="col-sm-10">
                        <input size="16" type="text" onclick="WdatePicker()" name="birthday" value="" readonly
                               class="form_datetime " id="form_datetime">
                    </div>
                </div>
                <div class="form-group">
                    <label for="邮箱" class="col-sm-1 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input size="16" type="text" name="email" value=""  class="form-control"  id="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="联系方式" class="col-sm-1 control-label">联系方式</label>
                    <div class="col-sm-10">
                        <input size="16" type="text" name="mobile" value=""  class="form-control" id="mobile">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-1 control-label">头像</label>
                    <input type="file" class="form-control-file" name="" id="" placeholder=""
                           aria-describedby="fileHelpId">
                    <small id="fileHelpId" class="form-text text-muted">JPG，PNG，GIF 格式图片,大小100*100</small>
                </div>


                {{--<input type="submit" value="保存修改" class="btn btn-primary">--}}
                <button type="submit" class="btn btn-primary">保存修改</button>
            </div>
        </div>


    </form>
@endsection
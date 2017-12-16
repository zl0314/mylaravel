@extends('layouts.master')
@section('content')
    @include('UEditor::head')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">文章管理</h3>
        </div>
        <div class="panel-body">

            <div class="result_wrap">
                <form action="{{url('/admin/article/'. $model->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <table class="add_tab">
                        <tbody>
                        <tr>
                            <th width="120"><i class="require">*</i>分类：</th>
                            <td>
                                <select name="category_id">
                                    <option value="">==请选择==</option>
                                    @foreach(\App\Model\Category::get() as $k => $r)
                                        <option value="{{$r->id}}" @if($model->category_id == $r->id) selected @endif>{{$r->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require">*</i>标题：</th>
                            <td>
                                <input type="text" class="lg" name="title" value="{{$model->title}}" maxlength="255"
                                       required>
                                <p>可以写255个字</p>
                            </td>
                        </tr>
                        <tr>
                            <th>推荐到首页：</th>
                            <td>
                                <label for=""><input type="radio" name="recommend_to_index"
                                                     @if($model->recommend_to_index == 1) checked @endif value="1">
                                    是</label>
                                <label for=""><input type="radio" name="recommend_to_index"
                                                     @if($model->recommend_to_index == 0) checked @endif  value="0">
                                    否</label>
                            </td>
                        </tr>

                        <tr>
                            <th><i class="require">*</i>SEOURL：</th>
                            <td>
                                <input type="text" class="lg" name="seourl" value="{{$model->seourl}}" maxlength="20"
                                       required>
                                <p>可以写20个字</p>
                            </td>
                        </tr>

                        <tr>
                            <th>作者：</th>
                            <td>
                                <input type="text" name="author" value="{{$model->author}}">
                                {{--<span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>--}}
                            </td>
                        </tr>

                        <tr>
                            <th><i class="require">*</i>缩略图：</th>
                            <td>
                                <input id="headimg" type="hidden" name="thumb" value="{{$model->thumb}}"
                                       class="input-txt"/>
                                <input type="button" class="ajaxUploadBtn btn-primary btn" id="thumb_button"
                                       onclick="ajaxUpload('thumb','thumb')"
                                       value="上传图片">
                                <small id="fileHelpId" class="form-text text-muted">JPG，PNG，GIF 格式图片,大小300*300</small>
                                <br><br>
                                <img src="@if( $model->thumb){{$model->thumb}}@else /zl/img/default_head.jpg @endif"    alt="" id="headimg_pic" width="100"  >
                            </td>
                        </tr>


                        <tr>
                            <th>描述：</th>
                            <td>
                                <textarea name="intro">{{$model->intro}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>详细内容：</th>
                            <td>
                                <!-- 加载编辑器的容器 -->
                                <script style="width:900px;" id="container" name="content" type="text/plain">{!! $model->content !!}</script>

                                <!-- 实例化编辑器 -->
                                <script type = "text/javascript" >
                                var ue = UE.getEditor('container');
                                ue.ready(function () {
                                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                                });
                                </script>

                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" class="btn btn-primary" value="提交">
                                <input type="button" class="btn btn-primary" onclick="history.go(-1)" value="返回">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.ajaxupload')
@endsection()
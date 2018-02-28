@extends('layouts.master')
@section('content')

    @include('UEditor::head')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">关于我</h3>
        </div>
        <div class="panel-body">

            <div class="result_wrap">
                <form action="{{url('admin/about')}}" method="post">
                    {{csrf_field()}}
                    <table class="add_tab">
                        <tbody>

                        <tr>
                            <th>详细内容：</th>
                            <td>

                                <!-- 加载编辑器的容器 -->
                                <script style="width:900px;" id="container" name="data[content]" type="text/plain">
                                    {!! $about->content !!}
                                </script>

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

@endsection()
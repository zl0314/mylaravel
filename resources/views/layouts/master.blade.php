<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/zl/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('/zl/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('/zl/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('/zl/js/ch-ui.admin.js')}}"></script>
    <!-- Latest compiled and minified JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/zl/layer/layer.js"></script>
    <link rel="stylesheet" href="/zl/css/bootstrap.min.css">
</head>
<title>测试后台</title>
<body>
<script>
    $.ajaxSetup({
        headers: { // 默认添加请求头
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
    });

    function del(id) {
        //询问框
        layer.confirm('确认要删除此记录？', {
            btn: ['确认', '取消'] //按钮
        }, function () {
            $.ajax({
                url: '{{url(request()->path())}}/' + id,
                method: 'DELETE',
                dataType: 'json',
                success: function (res) {
                    layer.msg(res.message, {icon: 1}, function(){
                        $('#item_' + id).remove();
                    });
                }
            })
        });

    }
</script>

@include('flash::message')
@include('layouts.crumb')

<div class="container" style="margin-top:10px;">
    @yield('content')
</div>

@include('layouts.errors')

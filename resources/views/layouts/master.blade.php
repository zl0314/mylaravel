<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('/zl/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('/zl/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('/zl/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('/zl/js/ch-ui.admin.js')}}"></script>

    <link rel="stylesheet" href="/zl/css/bootstrap.min.css">
</head>
<title>测试后台</title>
<body >


@include('layouts.crumb')

<div class="container" style="margin-top:10px;">
    @yield('content')
</div>


@include('layouts.errors')
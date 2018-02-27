<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<br>
@section('header')
    测试
@show
<br>

{{ $test }}

@component('web.alert')
    @slot('title')
        Forbidden
    @endslot()
    <strong>Whoops!</strong>  你没有权限访问这个资源！
@endcomponent

<br>
Hello, @{{ name }}.


@verbatim

    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim

@env('local')
test
@else
    online
@endenv


    <script>
        var app = @json($arr)
    </script>
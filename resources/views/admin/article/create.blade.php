@extends('layouts.admin')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;
        <a href="{{url('admin/article/index')}}">文章管理</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/article/store')}}" method="post">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="cate_id">
                                <option value="">==请选择==</option>
                                @foreach($categorys as $k => $r)
                                    <option value="{{$r['cate_id']}}">{{$r['cate_name']}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" name="">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>缩略图：</th>
                        <td><input type="file" name=""></td>
                    </tr>

                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="discription"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <textarea class="lg" name="content"></textarea>
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
</html>
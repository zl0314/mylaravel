<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2018/1/9
 * Time: 14:54
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends FrontController
{
    public function index(Request $request)
    {

//        return response()->json([
//            'name' => 'zhanglong',
//            'birthday' => '1991-01-13'
//        ])->withHeaders([
//            'X-Header-One' => 'Header Value',
//            'X-Header-Two' => 'Header Value',
//        ])->cookie('zl', 'zhanglong');

//        $url = action('UserController@profile', ['id' => 1]);
//        echo $url;

//        $value = $request->session()->get('key', 'test');
//        echo $value;
//
//        session(['test' => 123123]);
//        echo $request->session()->get('test');

        $vars = [
            'arr' => [1,12,3,4,5,6,7]
        ];
        return $this->display($vars);
    }
}
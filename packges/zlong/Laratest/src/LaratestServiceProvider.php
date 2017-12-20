<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2017/12/20
 * Time: 15:06
 */

namespace Zlong\Laratest;


use Illuminate\Support\ServiceProvider;

class LaratestServiceProvider extends ServiceProvider
{

    public function boot()
    {


        //自定义一个路由
        $router = app('router');
        $config = [];
        $config['namespace'] = __NAMESPACE__;
        $router->group($config, function ($router) {
            $router->get('laratest', function () {
                echo 'jadjkfadskf';
            });
        });
    }
}
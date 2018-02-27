<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2018/1/9
 * Time: 14:54
 */

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\FriendLink;
use Illuminate\Http\Request;

class IndexController extends FrontController
{
    public function index ()
    {
        //推荐文章
        $article = Article::Recommend()->get();
        //友情链接
        $friendlink = FriendLink::where([])->get();

        $vars = [
            'article' => $article,
            'fd'      => $friendlink,
        ];
        $this->assign( $vars );

        return $this->display();
    }


}
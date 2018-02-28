<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontController;
use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\FriendLink;
use App\Model\Category;

class ArticleController extends FrontController
{

    public function index ()
    {

        $articles = Article::where( [] )->paginate( 10 );

        //获取具有2篇文章以上的文章分类
        $category = Category::has( 'articles', '>=', '2' )->get();

        //友情链接
        $friendlink = FriendLink::where( [] )->get();

        $vars = [
            'articles' => $articles,
            'category' => $category,
            'fd'       => $friendlink,
        ];
        $this->assign( $vars );

        return $this->display();
    }

    //文章详情
    public function show ( $id )
    {
        $article = Article::findOrFail( $id );

        $click = $article->click + 1;
        $article->click = $click;
        $article->save();

        //上一篇
        $prev = Article::where( 'id', '<', $id )->first();

        //下一篇
        $next = Article::where( 'id', '>', $id )->first();

        $vars = [
            'article' => $article,
            'prev'    => $prev,
            'next'    => $next,
        ];
        $this->assign( $vars );

        return $this->display();
    }

    //得到  最新新闻  点击排行
    public function getClickLatest ()
    {
        //最新新闻
        $days_7_before_time = date( 'Y-m-d', strtotime( '-7 days' ) );
        $latest = Article::where( 'created_at', '>', $days_7_before_time )->select( 'title', 'id' )->get();

        //点击排行
        $click = DB::table( 'articles' )->select( 'title', 'id' )->where( 'click', '>', '0' )->limit( 5 )->orderBy( 'click', 'desc' )->get();

        $vars = [
            'latest' => $latest,
            'click'  => $click,
        ];

        return response()->json( $vars );
    }

}

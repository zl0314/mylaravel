<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontController;
use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends FrontController
{

    public function index ()
    {

    }

    //文章详情
    public function show ( $id )
    {
        $article = Article::findOrFail( $id );

        $click = $article->click+1;
        $article->click = $click;
        $article->save();

        //上一篇
        $prev = Article::where('id', '<', $id)->first();

        //下一篇
        $next = Article::where('id', '>', $id)->first();

        $vars = [
            'article' => $article,
            'prev' => $prev,
            'next' => $next,
        ];
        $this->assign( $vars );

        return $this->display();
    }

    //得到  最新新闻  点击排行
    public function getClickLatest ()
    {
        //最新新闻
        $days_7_before_time = date( 'Y-m-d', strtotime( '-7 days' ) );
        $latest = Article::where( 'created_at', '>', $days_7_before_time )->select( 'title','id' )->get();

        //点击排行
        $click = DB::table( 'articles' )->select('title','id')->where( 'click', '>', '0' )->limit( 5 )->orderBy( 'click', 'desc' )->get();

        $vars = [
            'latest' => $latest,
            'click'  => $click,
        ];

        return response()->json($vars);
    }

}

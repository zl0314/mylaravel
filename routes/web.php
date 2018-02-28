<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

include_once __DIR__ . '/admin/web.php';

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource( '/', 'IndexController' );

//文章
Route::resource( 'article', 'ArticleController' );
Route::get( 'getrank', 'ArticleController@getClickLatest' );

//标签
Route::resource( 'tag', 'TagController' );

//分类
Route::resource( 'category', 'CategoryController' );

//关于我
Route::get( 'about', 'AboutController@index' );

//留言板
Route::resource( 'message', 'MessageController' );

Auth::routes();
Route::get( '/home', 'HomeController@index' )->name( 'home' );

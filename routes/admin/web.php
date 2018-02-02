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

Route::group( [ 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin.auth' ], function () {
    Route::get( 'index', 'EntryController@index' );
    Route::get( 'info', 'EntryController@info' );
    Route::get( 'quite', 'EntryController@quite' );

    Route::get( 'my', 'EntryController@my' );
    Route::post( 'my', 'EntryController@updateInfo' );
    Route::get( 'chpass', 'EntryController@chpassForm' );
    Route::post( 'chpass', 'EntryController@changePassword' );


    Route::resource( 'tag', 'TagController' );
    Route::resource( 'category', 'CategoryController' );

    Route::post( 'tagdel', 'ArticleController@deleteTagableData' );
    Route::resource( 'article', 'ArticleController' );


    Route::get( 'setting', 'SettingController@index' );
    Route::post( 'setting', 'SettingController@store' );

    Route::resource( 'friend_link', 'FriendLink' );

} );

Route::group( [ 'prefix' => 'admin', 'namespace' => 'Admin' ], function () {
    Route::get( 'login', 'EntryController@login' );
    Route::post( 'login', 'EntryController@dologin' );
    Route::get( 'code/{radom}', 'EntryController@code' );
} );

//上传
Route::post( '/upload', 'UploadController@upload' );
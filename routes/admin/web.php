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

Route::group( [ 'prefix' => 'admin', 'namespace' => 'Admin' ], function () {
    Route::get( 'index', 'EntryController@index' );
    Route::get( 'login', 'EntryController@login' );
    Route::post( 'login', 'EntryController@dologin' );
    Route::get( 'code/{radom}', 'EntryController@code' );
    Route::get( 'info', 'EntryController@info' );
    Route::get( 'quite', 'EntryController@quite' );

    Route::get( 'my', 'EntryController@my' );
    Route::post( 'my', 'EntryController@updateInfo' );
    Route::get( 'chpass', 'EntryController@chpassForm' );
    Route::post( 'chpass', 'EntryController@changePassword' );


} );

Route::post('/upload', 'UploadController@upload');
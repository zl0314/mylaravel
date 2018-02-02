<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot ()
    {
        DB::listen( function ( $sql ) {
            //echo 'SQL语句执行：'.$sql->sql;
        } );
        Schema::defaultStringLength( 191 );

        Blade::if ( 'env', function ( $exp ) {
            return app()->environment( $exp );
        } );

        Relation::morphMap( [
            'article' => 'App\Model\Article',
        ] );
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register ()
    {
        //
    }
}

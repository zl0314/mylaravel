<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up ()
    {
        Schema::create( 'articles', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'title', 255 );
            $table->string( 'thumb', 255 );
            $table->dateTime( 'deleted_at' );
            $table->integer( 'category_id', false )->index();
            $table->text( 'content' );
            $table->string( 'intro', 255 );
            $table->unsignedTinyInteger( 'recommend_to_index', false );
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->string( 'seourl', 20 );
            $table->string('author', 20);
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists( 'articles' );
    }
}

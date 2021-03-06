<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSetting extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up ()
    {
        Schema::create( 'setting', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->longText( 'setting' );
        } );
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down ()
    {
        //
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminProfile extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up ()
    {
        Schema::create( 'admins_profile', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->timestamps();
            $table->string( 'email' );
            $table->string( 'mobile' );
            $table->string( 'realname' );
            $table->string( 'birthday' );
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('preferences', function(Blueprint $table){
            $table->increments('id');

            $table->integer('enduser_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('preferences', function(Blueprint $table){
            $table  ->foreign('enduser_id')->references('id')
                    ->on('endusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('preferences', function(Blueprint $table){
            $table->dropForeign('preferences_enduser_id_foreign');
        });

        Schema::drop('preferences');
    }
}

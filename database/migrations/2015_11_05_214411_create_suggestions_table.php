<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('suggestions', function($table){
            $table->increments('id');

            $table->text('message');

            $table->integer('enduser_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('suggestions', function(Blueprint $table){
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
        Schema::table('suggestions', function(Blueprint $table){
            $table->dropForeign('suggestions_enduser_id_foreign');
        });

        Schema::drop('suggestions');
    }
}

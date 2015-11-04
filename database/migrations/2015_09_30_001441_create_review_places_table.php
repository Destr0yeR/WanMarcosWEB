<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reviewplaces', function($table){
            $table->increments('id');

            $table->integer('score')->default(0);

            $table->integer('enduser_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->timestamps();
        });


        Schema::table('reviewplaces', function(Blueprint $table){
            $table  ->foreign('enduser_id')->references('id')
                    ->on('endusers')->onDelete('cascade');

            $table  ->foreign('place_id')->references('id')
                    ->on('places')->onDelete('cascade');

            $table  ->foreign('question_id')->references('id')
                    ->on('questions')->onDelete('cascade');
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
        Schema::table('reviewplaces', function(Blueprint $table){
            $table->dropForeign('reviewplaces_enduser_id_foreign');

            $table->dropForeign('reviewplaces_place_id_foreign');

            $table->dropForeign('reviewplaces_question_id_foreign');
        });

        Schema::drop('reviewplaces');
    }
}

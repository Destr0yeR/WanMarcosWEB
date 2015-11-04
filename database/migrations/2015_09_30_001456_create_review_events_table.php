<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reviewevents', function($table){
            $table->increments('id');

            $table->integer('score')->default(0);

            $table->integer('enduser_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->timestamps();
        });


        Schema::table('reviewevents', function(Blueprint $table){
            $table  ->foreign('enduser_id')->references('id')
                    ->on('endusers')->onDelete('cascade');

            $table  ->foreign('event_id')->references('id')
                    ->on('events')->onDelete('cascade');

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
        Schema::table('reviewevents', function(Blueprint $table){
            $table->dropForeign('reviewevents_enduser_id_foreign');

            $table->dropForeign('reviewevents_event_id_foreign');

            $table->dropForeign('reviewevents_question_id_foreign');
        });

        Schema::drop('reviewevents');
    }
}

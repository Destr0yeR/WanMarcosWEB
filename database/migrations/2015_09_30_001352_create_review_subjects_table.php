<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reviewsubjects', function($table){
            $table->increments('id');

            $table->integer('score')->default(0);

            $table->integer('enduser_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->timestamps();
        });


        Schema::table('reviewsubjects', function(Blueprint $table){
            $table  ->foreign('enduser_id')->references('id')
                    ->on('endusers')->onDelete('cascade');

            $table  ->foreign('subject_id')->references('id')
                    ->on('subjects')->onDelete('cascade');

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
        Schema::table('reviewsubjects', function(Blueprint $table){
            $table->dropForeign('reviewsubjects_enduser_id_foreign');

            $table->dropForeign('reviewsubjects_subject_id_foreign');

            $table->dropForeign('reviewsubjects_question_id_foreign');
        });

        Schema::drop('reviewsubjects');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('forms_questions', function(Blueprint $table){
            $table->increments('id');

            $table->integer('form_id')->unsigned();
            $table->integer('question_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('forms_questions', function(Blueprint $table){
            $table  ->foreign('form_id')->references('id')
                    ->on('forms')->onDelete('cascade');

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
        Schema::table('forms_questions', function(Blueprint $table){
            $table->dropForeign('forms_questions_form_id_foreign');

            $table->dropForeign('forms_questions_question_id_foreign');
        });

        Schema::drop('forms_questions');
    }
}

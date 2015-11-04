<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('professors_subjects', function(Blueprint $table){
            $table->increments('id');

            $table->integer('professor_id')->unsigned();
            $table->integer('subject_id')->unsigned();

            $table->timestamps();
        }); 

        Schema::table('professors_subjects', function(Blueprint $table){
            $table  ->foreign('professor_id')->references('id')
                    ->on('professors')->onDelete('cascade');

            $table  ->foreign('subject_id')->references('id')
                    ->on('subjects')->onDelete('cascade');
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
        Schema::table('professors_subjects', function(Blueprint $table){
            $table->dropForeign('professors_subjects_professor_id_foreign');

            $table->dropForeign('professors_subjects_subject_id_foreign');
        });

        Schema::drop('professors_subjects');
    }
}

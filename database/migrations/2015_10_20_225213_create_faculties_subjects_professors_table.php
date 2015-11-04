<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesSubjectsProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('faculties_professors_subjects', function(Blueprint $table){
            $table->increments('id');

            $table->integer('faculty_id')->unsigned();
            $table->integer('professors_subject_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('faculties_professors_subjects', function(Blueprint $table){
            $table  ->foreign('faculty_id')->references('id')
                    ->on('faculties')->onDelete('cascade');

            $table  ->foreign('professors_subject_id')->references('id')
                    ->on('professors_subjects')->onDelete('cascade');
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
        Schema::table('faculties_professors_subjects', function(Blueprint $table){
            $table->dropForeign('faculties_professors_subjects_faculty_id_foreign');

            $table->dropForeign('faculties_professors_subjects_professors_subject_id_foreign');
        });

        Schema::drop('faculties_professors_subjects');
    }
}

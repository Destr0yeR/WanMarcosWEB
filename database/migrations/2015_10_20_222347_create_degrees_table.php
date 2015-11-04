<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('degrees', function(Blueprint $table){
            $table->increments('id');

            $table->string('name');
            $table->integer('faculty_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('degrees', function(Blueprint $table){
            $table  ->foreign('faculty_id')->references('id')
                    ->on('faculties')->onDelete('cascade');
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
        Schema::table('degrees', function(Blueprint $table){
            $table  ->dropForeign('degrees_faculty_id_foreign');
        });

        Schema::drop('degrees');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEndusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('endusers', function(Blueprint $table){
            $table->integer('degree_id')->unsigned()->nullable();
            $table->integer('faculty_id')->unsigned()->nullable();
        });

        Schema::table('endusers', function(Blueprint $table){
            $table  ->foreign('degree_id')->references('id')
                    ->on('degrees')->onDelete('set null');

            $table  ->foreign('faculty_id')->references('id')
                    ->on('faculties')->onDelete('set null');
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
        Schema::table('endusers', function(Blueprint $table){
            $table->dropForeign('endusers_degree_id_foreign');

            $table->dropForeign('endusers_faculty_id_foreign');
        });

        Schema::table('endusers', function(Blueprint $table){
            $table->dropColumn('degree_id');
            $table->dropColumn('faculty_id');
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReviewsubjetsTableAddProffesorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('reviewsubjects', function(Blueprint $table){
            $table->integer('professor_id')->unsigned()->after('score');
        });

        Schema::table('reviewsubjects', function(Blueprint $table){
            $table  ->foreign('professor_id')->references('id')
                    ->on('professors')->onDelete('cascade');
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
            $table->dropForeign('reviewsubjects_professor_id_foreign');
        });

        Schema::table('reviewsubjects', function(Blueprint $table){
            $table->dropColumn('professor_id');
        });
    }
}

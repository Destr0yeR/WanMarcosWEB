<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('events', function(Blueprint $table){
            $table->integer('category_id')->unsigned()->nullable();
        });

        Schema::table('events', function(Blueprint $table){
            $table  ->foreign('category_id')->references('id')
                    ->on('categories')->onDelete('cascade');
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
        Schema::table('events', function(Blueprint $table){
            $table->dropForeign('events_category_id_foreign');
        });

        Schema::table('events', function(Blueprint $table){
            $table->dropColumn('category_id');
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventsTableAddEnduser extends Migration
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
            $table->integer('enduser_id')->unsigned()->nullable();
        });

        Schema::table('events', function(Blueprint $table){
            $table  ->foreign('enduser_id')->references('id')
                    ->on('endusers')->onDelete('set null');
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
            $table->dropForeign('events_enduser_id_foreign');
        });

        Schema::table('events', function(Blueprint $table){
            $table->dropColumn('enduser_id');
        });
    }
}

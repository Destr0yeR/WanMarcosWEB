<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('events', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('description');

            $table->string('image');
            $table->string('website');
            $table->string('information');

            $table->tinyInteger('approved')->default(0);
            
            $table->integer('place_id')->unsigned()->nullable();

            $table->integer('starts_at');
            $table->integer('ends_at');

            $table->timestamps();
        });

        Schema::table('events', function(Blueprint $table){
            $table  ->foreign('place_id')->references('id')
                    ->on('places')->onDelete('cascade');
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
            $table->dropForeign('events_place_id_foreign');
        });

        Schema::drop('events');
    }
}

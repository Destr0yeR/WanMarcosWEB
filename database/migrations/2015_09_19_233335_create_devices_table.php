<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('devices', function(Blueprint $table)
        {
            $table->string('token');
            $table->string('platform');
            $table->integer('enduser_id')->unsigned();

            $table->foreign('enduser_id')->references('id')->on('endusers')->onDelete('cascade');
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
        Schema::drop('devices');
    }
}

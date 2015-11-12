<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImagsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement('ALTER TABLE `events` MODIFY `image` VARCHAR(255);');
        DB::statement('ALTER TABLE `categories` MODIFY `default_image_url` VARCHAR(255);');
        DB::statement('ALTER TABLE `places` MODIFY `image` VARCHAR(255);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement('ALTER TABLE `places` MODIFY `image` VARCHAR(255) NOT NULL;');
        DB::statement('ALTER TABLE `categories` MODIFY `default_image_url` VARCHAR(255) NOT NULL;');
        DB::statement('ALTER TABLE `events` MODIFY `image` VARCHAR(255) NOT NULL;');
    }
}

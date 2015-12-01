<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReviewsTableAddMessage extends Migration
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
            $table->text('message')->nullable()->after('score');
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
            $table->dropColumn('message');
        });
    }
}

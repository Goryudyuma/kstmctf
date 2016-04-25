<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Changetablenickname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('ctfusersmail', function($table){
			 $table->dropColumn('nickname');
		});
		Schema::table('ctfuserstwitter', function($table){
			 $table->dropColumn('nickname');
		});
		Schema::table('ctfusers', function($table){
			 $table->string('nickname');
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
    }
}

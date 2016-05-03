<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Changeuserstabletwitter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('ctfuserstwitter', function($table){
			$table->renameColumn('id', 'userid');
		});
		Schema::table('solved', function($table){
			$table->renameColumn('uid', 'userid');
		});
		Schema::table('question', function($table){
			$table->renameColumn('creatorid', 'userid');
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

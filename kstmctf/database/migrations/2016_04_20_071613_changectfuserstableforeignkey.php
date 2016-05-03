<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Changectfuserstableforeignkey extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ctfuserstwitter', function($table){
			$table->unique('userid');
			$table->bigInteger('userid')->change();
			$table->index('userid');
		});
		Schema::table('solved', function($table){
			$table->index('userid');
		});
		Schema::table('question', function($table){
			$table->index('userid');
		});
		//
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

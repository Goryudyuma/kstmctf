<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtfusersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ctfusers', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid')->unsigned()->unique();
			$table->string('name');
			$table->string('nickname');
			$table->string('avatar');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ctfusers');
	}
}

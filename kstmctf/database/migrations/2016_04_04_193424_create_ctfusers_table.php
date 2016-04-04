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
			$table->string('screen_name');
			$table->string('image');
			$table->string('access_token');
			$table->string('access_token_secret');
			$table->timestamps();
			$table->index(['access_token', 'access_token_secret']);
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

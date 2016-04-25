<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Changeusertable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::rename('ctfusers', 'ctfuserstwitter');
		Schema::create('ctfusers', function (Blueprint $table){
			$table->bigIncrements('id');
			$table->string('remember_token', 100);
			$table->timestamps();	
		});
		Schema::create('ctfusersmail', function (Blueprint $table){
			$table->bigInteger('userid')->unsigned();
			$table->string('name', 255);
			$table->string('nickname', 255);
			$table->string('email', 255)->unique();
			$table->string('password', 255);
			$table->timestamps();
			
			//$table->primary('userid');
		});
		Schema::create('ctfuserskstm', function (Blueprint $table){
			$table->bigInteger('userid')->unsigned();
			$table->boolean('kstmflag')->default(false);

			//$table->primary('userid');
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
		Schema::drop('ctfuserskstm');
		Schema::drop('ctfusersmail');
		Schema::drop('ctfusers');
		Schema::rename('ctfuserstwitter', 'ctfusers');
    }
}

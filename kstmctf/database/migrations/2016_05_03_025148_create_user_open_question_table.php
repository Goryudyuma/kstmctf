<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOpenQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openquestion', function (Blueprint $table) {
            $table->increments('id');
			$table->biginteger('userid')->unsigned();
			$table->foreign('userid')->references('id')->on('ctfusers');
			$table->integer('questionid')->unsigned();
			$table->foreign('questionid')->references('id')->on('question');
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
        Schema::drop('openquestion');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolvedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solved', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('uid')->references('uid')->on('ctfusers');
			$table->integer('qid')->references('id')->on('question');
            $table->timestamps();
			$table->unique(['uid', 'qid']);
			$table->index(['uid', 'qid']);
			$table->index(['qid', 'uid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solved');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUrlInQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function (Blueprint $table) {
            //
			$table->dropColumn('url');
			$table->bigInteger('urlid')->unsigned();
			$table->foreign('urlid')->references('id')->on('urllist');
			$table->dropIndex('question_creatorid_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function (Blueprint $table) {
            //
			$table->dropForeign('question_urlid_foreign');
        });
    }
}

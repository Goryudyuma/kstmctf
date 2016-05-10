<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUrllistidInOpenquestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('openquestion', function (Blueprint $table) {
            //
			$table->dropForeign('openquestion_questionid_foreign');
			$table->dropColumn('questionid');
			$table->bigInteger('urllistid')->unsigned();
			$table->foreign('urllistid')->references('id')->on('urllist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('openquestion', function (Blueprint $table) {
            //
			$table->dropForeign('openquestion_urllistid_foreign');
        });
    }
}

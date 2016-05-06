<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrimaryKeyCtfusersmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ctfusersmail', function (Blueprint $table) {
			$table->bigIncrements('id');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ctfusersmail', function (Blueprint $table) {
			$table->dropColumn('id');
            //
        });
    }
}

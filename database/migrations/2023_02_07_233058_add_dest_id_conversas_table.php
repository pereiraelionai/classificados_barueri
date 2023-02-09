<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestIdConversasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversas', function (Blueprint $table) {
            $table->unsignedBigInteger('dest_id')->after('autor_id')->default(1);

            $table->foreign('dest_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversas', function(Blueprint $table) {
            $table->dropForeign('conversas_dest_id_foreign');

            $table->dropColumn('dest_id');
        });
    }
}

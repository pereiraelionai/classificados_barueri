<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAutorIdConversas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversas', function (Blueprint $table) {
            $table->unsignedBigInteger('autor_id')->after('mensagens_id')->default(1);

            $table->foreign('autor_id')->references('id')->on('users');
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
            $table->dropForeign('conversas_autor_id_foreign');

            $table->dropColumn('autor_id');
        });
    }
}

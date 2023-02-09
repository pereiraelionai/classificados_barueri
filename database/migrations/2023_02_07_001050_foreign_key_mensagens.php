<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyMensagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensagens', function(Blueprint $table) {
            $table->foreign('id_remetente')->references('id')->on('users');
            $table->foreign('id_destinatario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensagens', function (Blueprint $table) {
            $table->dropForeign('mensagens_id_destinatario_foreign');
            $table->dropForeign('mensagens_id_remetente_foreign');
        });
    }
}

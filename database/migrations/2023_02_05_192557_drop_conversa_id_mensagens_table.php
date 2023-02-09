<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropConversaIdMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensagens', function(Blueprint $table) {
//          $table->dropForeign('mensagems_conversas_id_foreign');
            $table->dropColumn('conversas_id');
        });

        Schema::table('conversas', function(Blueprint $table) {
            $table->unsignedBigInteger('mensagens_id')->after('mensagem')->default(1);
            $table->foreign('mensagens_id')->references('id')->on('mensagens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversas', function (Blueprint $table) {
            $table->dropForeign('conversas_mensagens_id_foreign');
            $table->dropColumn('mensagens_id');
        });

        Schema::table('mensagens', function(Blueprint $table) {
            $table->unsignedBigInteger('conversas_id')->after('id_destinatario');
            $table->foreign('conversas_id')->references('id')->on('conversas');
        });
    }
}

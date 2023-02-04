<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnuncioMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensagens', function (Blueprint $table) {
            $table->unsignedBigInteger('anuncio_id')->after('conversas_id');
            $table->unsignedBigInteger('tipo_anuncio')->after('anuncio_id');

            $table->foreign('anuncio_id')->references('id')->on('anuncio_produtos');
            $table->foreign('tipo_anuncio')->references('id')->on('tipo_anuncios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensagens', function(Blueprint $table) {
            $table->dropForeign('mensagens_tipo_anuncio_foreign');
            $table->dropForeign('mensagens_anuncio_id_foreign');

            $table->dropColumn('tipo_anuncio');
            $table->dropColumn('anuncio_id');
        });
    }
}

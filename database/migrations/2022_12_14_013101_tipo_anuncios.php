<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoAnuncios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->timestamps();
        });

        Schema::table('anuncio_produtos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('tipo_anuncios_id')->references('id')->on('tipo_anuncios');
        });

        Schema::table('anuncio_servicos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('tipo_anuncios_id')->references('id')->on('tipo_anuncios');
        });

        Schema::table('anuncio_empregos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('tipo_anuncios_id')->references('id')->on('tipo_anuncios');
            $table->foreign('regime_id')->references('id')->on('regimes');
        });

        Schema::table('favoritos', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('tipo_anuncios_id')->references('id')->on('tipo_anuncios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('favoritos', function(Blueprint $table) {
            $table->dropForeign('favoritos_tipo_anuncios_id_foreign');
            $table->dropForeign('favoritos_users_id_foreign');
        });

        Schema::table('anuncio_empregos', function(Blueprint $table) {
            $table->dropForeign('anuncio_empregos_regime_id_foreign');
            $table->dropForeign('anuncio_empregos_tipo_anuncios_id_foreign');
            $table->dropForeign('anuncio_empregos_categoria_id_foreign');
        });

        Schema::table('anuncio_servicos', function(Blueprint $table) {
            $table->dropForeign('anuncio_servicos_tipo_anuncios_id_foreign');
            $table->dropForeign('anuncio_servicos_categoria_id_foreign');
        });

        Schema::table('anuncio_produtos', function(Blueprint $table) {
            $table->dropForeign('anuncio_produtos_tipo_anuncios_id_foreign');
            $table->dropForeign('anuncio_produtos_categoria_id_foreign');
        });

        Schema::dropIfExists('tipo_anuncios');
    }
}

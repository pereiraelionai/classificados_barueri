<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoCanceladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_cancelados', function (Blueprint $table) {
            $table->id();
            $table->string('nome_motivo_cancelado');
            $table->timestamps();
        });

        Schema::table('cancelado_produtos', function (Blueprint $table) {
            $table->foreign('anuncio_produtos_id')->references('id')->on('anuncio_produtos');
            $table->foreign('motivo_cancelados_id')->references('id')->on('motivo_cancelados');
        });

        Schema::table('cancelado_servicos', function (Blueprint $table) {
            $table->foreign('anuncio_servicos_id')->references('id')->on('anuncio_servicos');
            $table->foreign('motivo_cancelados_id')->references('id')->on('motivo_cancelados');
        });

        Schema::table('cancelado_empregos', function (Blueprint $table) {
            $table->foreign('anuncio_empregos_id')->references('id')->on('anuncio_empregos');
            $table->foreign('motivo_cancelados_id')->references('id')->on('motivo_cancelados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('cancelado_empregos', function(Blueprint $table) {
            $table->dropForeign('cancelado_empregos_motivo_cancelados_id_foreign');
            $table->dropForeign('cancelado_empregos_anuncio_empregos_id_foreign');
        });

        Schema::table('cancelado_servicos', function(Blueprint $table) {
            $table->dropForeign('cancelado_servicos_motivo_cancelados_id_foreign');
            $table->dropForeign('cancelado_servicos_anuncio_servicos_id_foreign');
        });

        Schema::table('cancelado_produtos', function(Blueprint $table) {
            $table->dropForeign('cancelado_produtos_motivo_cancelados_id_foreign');
            $table->dropForeign('cancelado_produtos_anuncio_produtos_id_foreign');
        });

        Schema::dropIfExists('motivo_cancelados');
    }
}

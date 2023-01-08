<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExibirContatoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anuncio_produtos', function (Blueprint $table) {
            $table->boolean('exibir_contato')->default(0)->after('ativo');
        });

        Schema::table('anuncio_empregos', function (Blueprint $table) {
            $table->boolean('exibir_contato')->default(0)->after('ativo');
        });

        Schema::table('anuncio_servicos', function (Blueprint $table) {
            $table->boolean('exibir_contato')->default(0)->after('ativo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncio_servicos', function (Blueprint $table) {
            $table->dropColumn('exibir_contato');
        });

        Schema::table('anuncio_empregos', function (Blueprint $table) {
            $table->dropColumn('exibir_contato');
        });
        
        Schema::table('anuncio_produtos', function (Blueprint $table) {
            $table->dropColumn('exibir_contato');
        });        
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnuncioEmpregosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_empregos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('categoria_id')->default(2);
            $table->unsignedBigInteger('regime_id');
            $table->longText('descricao');
            $table->string('cidade');
            $table->char('estado', 2);
            $table->float('salario', 8, 2);
            $table->boolean('por_hora');
            $table->string('nome_empresa')->default('Confidencial');
            $table->integer('qtd_vagas');
            $table->date('data_inicio');
            $table->unsignedBigInteger('tipo_anuncios_id')->default(3);
            $table->boolean('ativo')->default(true);
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncio_empregos');
    }
}

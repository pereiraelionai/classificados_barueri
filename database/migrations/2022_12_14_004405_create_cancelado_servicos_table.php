<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanceladoServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancelado_servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anuncio_servicos_id');
            $table->unsignedBigInteger('motivo_cancelados_id');
            $table->longText('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancelado_servicos');
    }
}

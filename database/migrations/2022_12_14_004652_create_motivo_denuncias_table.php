<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('nome_motivo');
            $table->timestamps();
        });

        Schema::table('denuncias', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('motivo_denuncias_id')->references('id')->on('motivo_denuncias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('denuncias', function(Blueprint $table) {
            $table->dropForeign('denuncias_motivo_denuncias_id_foreign');
            $table->dropForeign('denuncias_users_id_foreign');
        });

        Schema::dropIfExists('motivo_denuncias');
    }
}

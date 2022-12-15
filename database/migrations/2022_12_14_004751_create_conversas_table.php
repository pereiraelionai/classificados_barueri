<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversas', function (Blueprint $table) {
            $table->id();
            $table->boolean('lida')->default(false);
            $table->longText('mensagem');
            $table->timestamps();
        });

        Schema::table('mensagems', function (Blueprint $table) {
            $table->foreign('conversas_id')->references('id')->on('conversas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('mensagems', function(Blueprint $table) {
            $table->dropForeign('mensagems_conversas_id_foreign');
        });

        Schema::dropIfExists('conversas');
    }
}

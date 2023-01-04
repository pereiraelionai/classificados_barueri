<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToAnuncioServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anuncio_servicos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->after('id');
        });

        Schema::table('anuncio_servicos', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncio_servicos', function(Blueprint $table) {
            $table->dropForeign('anuncio_servicos_id_users_foreign');
        });

        Schema::table('anuncio_servicos', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
}

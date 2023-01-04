<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToAnuncioEmpregosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anuncio_empregos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->after('id');
        });

        Schema::table('anuncio_empregos', function (Blueprint $table) {
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
        Schema::table('anuncio_empregos', function(Blueprint $table) {
            $table->dropForeign('anuncio_empregos_id_users_foreign');
        });

        Schema::table('anuncio_empregos', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
}

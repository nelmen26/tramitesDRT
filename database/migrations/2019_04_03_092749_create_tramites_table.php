<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nro_tramite');
            $table->string('tipo');
            $table->date('fecha_recepcion');
            $table->date('fecha_finalizacion');
            $table->enum('estado',['C','O'])->default('C');   //C: Correcto, O: Observado

            $table->integer('user_id')->unsigned();
            $table->integer('contribuyente_id')->unsigned();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contribuyente_id')->references('id')->on('contribuyentes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramites');
    }
}

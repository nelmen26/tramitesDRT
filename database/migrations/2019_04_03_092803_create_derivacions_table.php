<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDerivacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derivacions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');

            $table->integer('tramite_id')->unsigned();
            $table->integer('area_id')->unsigned();

            $table->timestamps();

            $table->foreign('tramite_id')->references('id')->on('tramites')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derivacions');
    }
}

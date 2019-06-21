<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HargaKomoditas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_komoditas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('komoditas_id');
            $table->unsignedBigInteger('pedagang_id');
            $table->unsignedBigInteger('petugas_id');
            $table->date('tanggal');
            $table->unsignedInteger('harga');
            $table->timestamps();

            $table->foreign('komoditas_id')
                  ->references('id')
                  ->on('komoditas');

            $table->foreign('pedagang_id')
            ->references('id')
            ->on('pedagang');

            $table->foreign('petugas_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_komoditas');
    }
}

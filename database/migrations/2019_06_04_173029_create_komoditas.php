<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomoditas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komoditas', function (Blueprint $table) {
            $table->bigIntcrements('id');
            $table->string('nama')->unique();
            $table->unsignedBigInteger('jenis_komoditas-id');
            $table->unsignedBiginteger('satuan_id')->nullable();
            $table->timestamps();

            $table->foreign('jenis_komoditas_id')
                  ->references('id')
                  ->on('jenis_komoditas');
            
            $table->foreign('satuan_id')
                  ->references('id')
                  ->on('satuan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komoditas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('pkl_id');
            $table->unsignedBigInteger('lokasi_pkl');
            $table->string("waktu");
            $table->string("nilai");
            $table->string("status");


            $table->foreign('pkl_id')->references('id')->on('pkl');
            $table->foreign('lokasi_pkl')->references('id')->on('table_user_mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran');
    }
}

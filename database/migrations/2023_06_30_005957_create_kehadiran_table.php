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
            $table->foreignId("pkl_id")->constrained("pkl");
            $table->dateTime("tanggalwaktu");
            // $table->date("tanggal");
            // $table->time("waktu");
            $table->enum("kehadiran",[0,1,2,3]);
            $table->string("keterangan");
            $table->enum("status",[1,2,3]);
            
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

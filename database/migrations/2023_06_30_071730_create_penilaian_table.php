<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("pkl_id")->constrained("pkl");
            $table->dateTime("tgl_mulai");
            $table->dateTime("tgl_selesai");
            $table->integer("rerata");
            $table->integer("pengetahuan");
            $table->integer("pelaksanaan");
            $table->integer("kerjasama");
            $table->integer("kreativitas");
            $table->integer("kedisiplinan");
            $table->integer("sikap");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("pkl_id") -> unsigned();
            $table->string("capaian");
            $table->string("sub_capaian");
            $table->integer("durasi");
            $table->enum('status',[1,2,3]);
            $table->foreign("pkl_id") -> references('id')->on('pkl') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}

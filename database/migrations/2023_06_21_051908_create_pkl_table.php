<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePklTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkl', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("mahasiswa_id") -> unsigned();
            $table->integer("dospem_id") -> unsigned();
            $table->integer("dpl_id") -> unsigned();
            $table->foreign("mahasiswa_id") -> references('id')->on('mahasiswa') ->onDelete('cascade');
            $table->foreign("dospem_id") -> references('id')->on('dospem') ->onDelete('cascade');
            $table->foreign("dpl_id") -> references('id')->on('dpl') ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkl');
    }
}

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
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('dpl_id');
            $table->unsignedBigInteger('dosbing_id');

            $table->foreign('mahasiswa_id')->references('id')->on('table_user_mahasiswa');
            $table->foreign('dosbing_id')->references('id')->on('table_user_dosbing');
            $table->foreign('dpl_id')->references('id')->on('table_user_dpl');
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

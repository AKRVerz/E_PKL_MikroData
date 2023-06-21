<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpl', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nip");
            $table->string("email");
            $table->string("password");
            $table->string("nama");
            $table->string("jabatan");
            $table->string("instansi");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dpl');
    }
}

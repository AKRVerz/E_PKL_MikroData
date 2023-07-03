<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pkl_id')->constrained('pkl');
            $table->string("kegiatan");
            $table->string("alatbahan");
            $table->date("waktu");
            $table->enum('status', [1, 2, 3]);
            $table->string("materi");
            $table->string("prosedur");
            $table->string("hasil");
            $table->string("komentar");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal');
    }
}

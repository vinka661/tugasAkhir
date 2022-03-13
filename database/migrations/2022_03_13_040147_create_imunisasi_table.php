<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImunisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imunisasi', function (Blueprint $table) {
            $table->increments('id_imunisasi');
            $table->date('tanggal_beri_imunisasi');
            $table->unsignedInteger('id_bb');
            $table->unsignedInteger('id_vaksin_imunisasi');
            $table->timestamps();
            $table->foreign('id_bb')->references('id_bb')->on('bayi_balita');
            $table->foreign('id_vaksin_imunisasi')->references('id_vaksin_imunisasi')->on('jenis_vaksin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imunisasi');
    }
}

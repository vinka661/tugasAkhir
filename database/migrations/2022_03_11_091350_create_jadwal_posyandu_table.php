<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPosyanduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_posyandu', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->string('hari', 6);
            $table->time('jam');
            $table->date('tanggal');
            $table->string('agenda', 30);
            $table->string('tempat', 30);
            $table->unsignedInteger('id_posyandu');
            $table->timestamps();
            $table->foreign('id_posyandu')->references('id_posyandu')->on('posyandu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_posyandu');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyuluhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyuluhan', function (Blueprint $table) {
            $table->increments('id_penyuluhan');
            $table->string('hari', 6);
            $table->text('materi');
            $table->string('video', 20);
            $table->date('tanggal');
            $table->unsignedInteger('id');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyuluhan');
    }
}

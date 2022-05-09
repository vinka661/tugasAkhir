<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayiBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayi_balita', function (Blueprint $table) {
            $table->increments('id_bb');
            $table->string('nama_bayi', 50);
            $table->date('ttl');
            $table->string('umur', 2);
            $table->string('alamat', 30);
            $table->string('nama_ayah', 30);
            $table->string('jenis_kelamin', 9);
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
        Schema::dropIfExists('bayi_balita');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimbangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timbang', function (Blueprint $table) {
            $table->increments('id_timbang');
            $table->date('tgl_timbang');
            $table->double('berat_badan');
            $table->double('tinggi_badan');
            $table->double('lingkar_kepala');
            $table->string('status_gizi', 30);
            $table->unsignedInteger('id');
            $table->unsignedInteger('id_bb');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('id_bb')->references('id_bb')->on('bayi_balita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timbang');
    }
}

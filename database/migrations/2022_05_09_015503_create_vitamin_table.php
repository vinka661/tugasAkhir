<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitaminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitamin', function (Blueprint $table) {
            $table->increments('id_vitaminA');
            $table->string('kapsul_vitaminA', 30);
            $table->date('tanggal_beri_vitaminA');
            $table->unsignedInteger('id_bb');
            $table->timestamps();
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
        Schema::dropIfExists('vitamin');
    }
}

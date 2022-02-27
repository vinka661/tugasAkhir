<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('posyandu_id');
            $table->string('name', 30);
            $table->string('email', 30);
            $table->string('password', 30);
            $table->string('role', 30);
            $table->string('photo', 30);
            $table->string('alamat', 30);
            $table->string('jenis_kelamin', 9);
            $table->timestamps();
            $table->foreign('posyandu_id')->references('id_posyandu')->on('posyandu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_user');
    }
}

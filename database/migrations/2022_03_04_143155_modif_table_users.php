<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('users',function (Blueprint $table){
        //     $table->string('role', 13);
        //     $table->string('photo', 20);
        //     $table->string('alamat', 30);
        //     $table->string('jenis_kelamin', 9);
        //     $table->unsignedInteger('id_posyandu');
        //     $table->foreign('id_posyandu')->references('id_posyandu')->on('posyandu');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users',function (Blueprint $table){
        //     $table->dropColumn('role');
        //     $table->dropColumn('photo');
        //     $table->dropColumn('alamat');
        //     $table->dropColumn('jenis_kelamin');
        //     $table->dropColumn('id_posyandu');
        // });
    }
}

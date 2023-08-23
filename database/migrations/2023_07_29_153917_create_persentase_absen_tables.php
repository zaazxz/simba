<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersentaseAbsenTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persentase_absen', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->nullable();
            $table->string('nama');
            $table->integer('jadwal_keseluruhan')->nullable();
            $table->integer('terlaksana')->nullable();
            $table->integer('hadir')->nullable();
            $table->integer('tidak_hadir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persentase_absen');
    }
}

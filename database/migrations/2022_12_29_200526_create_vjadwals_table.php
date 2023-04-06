<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVjadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vjadwal', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('thnp');
            $table->string('smtr');
            $table->string('user_uid');
            $table->string('notelp');
            $table->string('nama_lengkap');
            $table->string('hari');
            $table->string('kelas');
            $table->string('mapel');
            $table->string('jumlah_jam');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->string('unit');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('vjadwal');
    }
}

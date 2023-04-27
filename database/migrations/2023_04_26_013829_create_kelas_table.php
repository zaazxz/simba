<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->unique();
            $table->foreignId('walikelas_id')->nullable();
            $table->string('nama');
            $table->enum('unit', ['SD Bakti Nusantara 666', 'SMP Bakti Nusantara 666', 'SMK Bakti Nusantara 666', 'YPDM Bakti Nusantara 666']);
            $table->string('telp_km')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('kelas');
    }
}

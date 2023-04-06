<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('uid')->nullable();
            $table->enum('role', ['Admin', 'Yayasan', 'Kepala Sekolah', 'Staff Pimpinan', 'Guru', 'Wali Kelas', 'Tata Usaha', 'Murid', 'Orang Tua', 'Alumni', 'Guest']);
            $table->enum('unit', ['SD Bakti Nusantara 666', 'SMP Bakti Nusantara 666', 'SMK Bakti Nusantara 666', 'YPDM Bakti Nusantara 666']);
            $table->string('unit2')->nullable();
            $table->boolean('status')->default(0);
            $table->string('nirg')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('jk')->nullable();
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabkota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('notelp')->nullable();
            $table->string('photo')->default('avatar-1.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

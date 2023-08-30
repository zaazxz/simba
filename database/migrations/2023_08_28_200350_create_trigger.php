<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert New User To Persentase
        DB::unprepared('
            CREATE TRIGGER InsertNewUserToPersentase
            AFTER INSERT ON users
            FOR EACH ROW
            BEGIN
                IF NEW.role = "Guru" THEN
                INSERT INTO persentase_absen
                (
                    uid,
                    nama,
                    email,
                    jadwal_keseluruhan,
                    terlaksana,
                    hadir,
                    tidak_hadir,
                    created_at,
                    updated_at
                )
                VALUES
                (
                    NEW.uid,
                    NEW.name,
                    NEW.email,
                    0,
                    0,
                    0,
                    0,
                    NOW(),
                    NULL
                );
                INSERT INTO persentase_bulanan
                (
                    uid,
                    nama,
                    email,
                    jadwal_bulanan,
                    terlaksana,
                    hadir,
                    tidak_hadir,
                    created_at,
                    updated_at
                )
                VALUES
                (
                    NEW.uid,
                    NEW.name,
                    NEW.email,
                    0,
                    0,
                    0,
                    0,
                    NOW(),
                    NULL
                );
                END IF;
            END
        ');

        // Delete Old User If Users Deleted
        DB::unprepared('
            CREATE TRIGGER DeleteOldUserInPersentase
            AFTER DELETE ON users
            FOR EACH ROW
            BEGIN
                DELETE FROM persentase_absen WHERE simba.persentase_absen.email = OLD.email;
                DELETE FROM persentase_bulanan WHERE simba.persentase_bulanan.email = OLD.email;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS InsertNewUserToPersentase');
        DB::unprepared('DROP TRIGGER IF EXISTS DeleteOldUserInPersentase');
    }
}

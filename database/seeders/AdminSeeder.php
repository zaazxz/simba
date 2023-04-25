<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'code'              => Str::random(7),
                'kelas_id'          => '',
                'name'              => 'Administrator',
                'email'             => 'admin@iotech.id',
                'uid'               => '1',
                'role'              => 'Admin',
                'unit'              => 'SMP Bakti Nusantara 666',
                'unit2'             => 'SMK Bakti Nusantara 666',
                'nirg'              => '201071282',
                'nuptk'             => '5353760661110032',
                'jk'                => 'Laki-laki',
                'pob'               => 'Bandung',
                'dob'               => '2004-03-23',
                'alamat'            => 'Mutiara Venue Blok MR No. 10',
                'Provinsi'          => '32',
                'kabkota'           => '3204',
                'kecamatan'         => '3204110',
                'kelurahan'         => '3204110004',
                'notelp'            => '6285722828810',
                'status'            => '1',
                'password'          => bcrypt('Admin123'),
                'email_verified_at' => Carbon::now(),
                'remember_token'    => Str::random(10),
                'created_at'        => Carbon::now(),
            ]
        ]);
    }
}

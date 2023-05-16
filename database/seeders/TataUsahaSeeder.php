<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TataUsahaSeeder extends Seeder
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
                'name'              => 'Tata Usaha',
                'email'             => 'tatausaha@gmail.com',
                'uid'               => '1',
                'role'              => 'Tata Usaha',
                'unit'              => 'SMP Bakti Nusantara 666',
                'unit2'             => 'SMK Bakti Nusantara 666',
                'nirg'              => '201071284',
                'nuptk'             => NULL,
                'jk'                => 'Laki-laki',
                'pob'               => 'Bandung',
                'dob'               => '2007-05-29',
                'alamat'            => 'Mutiara Venue Blok MR No. 10',
                'notelp'            => '085225681732',
                'status'            => '1',
                'password'          => bcrypt('Hrd123'),
                'email_verified_at' => Carbon::now(),
                'remember_token'    => Str::random(10),
                'created_at'        => Carbon::now(),
            ]
        ]);
    }
}

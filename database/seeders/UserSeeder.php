<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name'              => 'ANAN S.Pd.I',
                'email'             => 'anan06@guru.smp.belajar.id',
                'uid'               => '2',
                'role'              => 'Guru',
                'unit'              => 'SMP Bakti Nusantara 666',
                'unit2'             => '',
                'status'            => '1',
                'nirg'              => '22152002',
                'nuptk'             => '3962 760651130152',
                'jk'                => 'Laki-Laki',
                'pob'               => 'Bandung',
                'dob'               => '2000-01-01',
                'alamat'            => '',
                'Provinsi'          => '32',
                'kabkota'           => '3204',
                'kecamatan'         => '3204110',
                'kelurahan'         => '3204110005',
                'notelp'            => '6281223892170',
                'password'          => bcrypt('Guru123'),
                'email_verified_at' => Carbon::now(),
                'remember_token'    => Str::random(10),
                'created_at'        => Carbon::now(),
            ],
        ]);
    }
}

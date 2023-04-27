<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'code' => Str::random(5),
                'walikelas_id' => '1',
                'nama' => 'IX A',
                'km' => 'Achyara Narasya Marlanda',
                'unit' => 'SMP Bakti Nusantara 666',
                'telp_km' => '089681238317'
            ],
            [
                'code' => Str::random(5),
                'walikelas_id' => '2',
                'nama' => 'IX B',
                'km' => 'Kelea',
                'unit' => 'SMK Bakti Nusantara 666',
                'telp_km' => '089681238317'
            ],
        ]);
    }
}

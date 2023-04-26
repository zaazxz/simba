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
            'code' => Str::random(5),
            'walikelas_id' => '1',
            'nama' => 'IX A',
            'telp_km' => '089681238317'
        ]);

    }
}

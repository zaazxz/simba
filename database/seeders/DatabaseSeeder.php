<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::insert(
            [
                [
                    'code'      => 'abc-def',
                    'name'      => 'Administrator',
                    'email'     => 'admin@iotech.id',
                    'uid'      => '1',
                    'role'      => 'Admin',
                    'unit'      => 'SMP Bakti Nusantara 666',
                    'unit2'     => 'SMK Bakti Nusantara 666',
                    'nirg'      => '201071282',
                    'nuptk'     => '5353760661110032',
                    'jk' 	    => 'Laki-laki',
                    'pob'       => 'Bandung',
                    'dob'       => '2004-03-23',
                    'alamat'   =>  'Mutiara Venue Blok MR No. 10',
                    'Provinsi'  => '32',
                    'kabkota'   => '3204',
                    'kecamatan' => '320428',
                    'kelurahan' => '3204282004',
                    'notelp'    => '6285722828810',
                    'status'    => '1',
                    'password'  => bcrypt('Admin123')
                ],
                [
                    'code'      => 'ghi-jkl',
                    'name'      => 'Rio Andrianto',
                    'email'     => 'rio@iotech.id',
                    'uid'      => '6',
                    'role'      => 'Guru',
                    'unit'      => 'SMK Bakti Nusantara 666',
                    'unit2'     => 'SMP Bakti Nusantara 666',
                    'nirg'      => '201071282',
                    'nuptk'     => '5353760661110033',
                    'jk' 	    => 'Laki-Laki',
                    'pob'       => 'Bandung',
                    'dob'       => '1982-12-07',
                    'alamat'   => 'Mutiara Venue Blok MR No. 10',
                    'Provinsi'  => '32',
                    'kabkota'   => '3204',
                    'kecamatan' => '320428',
                    'kelurahan' => '3204282004',
                    'notelp'    => '6285722828810',
                    'status'    => '1',
                    'password'  => bcrypt('Guru123')
                ],
                [
                    'code'      => 'mno-pqe-stu',
                    'name'      => 'Icha Putri Adestiani',
                    'email'     => 'ichaputrikembar2@inovindo.co.id',
                    'uid'      => '7',
                    'role'      => 'Guru',
                    'unit'      => 'SMP Bakti Nusantara 666',
                    'unit2'     => '',
                    'nirg'      => '201071283',
                    'nuptk'     => '5353760661110034',
                    'jk' 	    => 'Perempuan',
                    'pob'       => 'Bandung',
                    'dob'       => '2004-03-23',
                    'alamat'    => 'Mutiara Venue Blok MR No. 10',
                    'Provinsi'  => '32',
                    'kabkota'   => '3204',
                    'kecamatan' => '320428',
                    'kelurahan' => '3204282004',
                    'notelp'    => '6285722828810',
                    'status'    => '0',
                    'password'  => bcrypt('Guru123')
                ]]
        );
    }
}

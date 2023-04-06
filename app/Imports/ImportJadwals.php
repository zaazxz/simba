<?php
namespace App\Imports;

use App\Models\vjadwal;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportJadwals implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new vjadwal([
            'thnp' => $row[0],
            'smtr' => $row[1],
            'user_uid' => $row[2],
            'notelp' => $row[3],
            'nama_lengkap' => $row[4],
            'hari' => $row[5],
            'kelas' => $row[6],
            'mapel' => $row[7],
            'jumlah_jam' => $row[8],
            'jam_masuk' => $row[9],
            'jam_keluar' => $row[10],
            'unit' => $row[11],
            'status' => $row[12]
        ]);
    }
}

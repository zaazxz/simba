<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vjadwal extends Model
{
    use HasFactory;
    protected $table = 'vjadwal';
    protected $fillable = ['thnp', 'smtr', 'user_uid', 'notelp','nama_lengkap', 'hari', 'kelas', 'mapel', 'jumlah_jam', 'jam_masuk', 'jam_keluar', 'unit', 'status'];
}

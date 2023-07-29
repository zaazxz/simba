<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseAbsensi extends Model
{
    use HasFactory;

    protected $table = 'persentase_absen';
    protected $guarded = ['id'];

}

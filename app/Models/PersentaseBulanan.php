<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseBulanan extends Model
{
    use HasFactory;

    protected $table = 'persentase_bulanan';
    protected $guarded = ['id'];

}

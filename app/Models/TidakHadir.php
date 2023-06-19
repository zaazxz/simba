<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TidakHadir extends Model
{
    use HasFactory;

    protected $table = 'logtidakhadir';
    protected $guarded = ['id'];

}

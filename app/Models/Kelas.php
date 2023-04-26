<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function walikelas() {
        return $this->hasOne(User::class, 'walikelas_id', 'id');
    }

}

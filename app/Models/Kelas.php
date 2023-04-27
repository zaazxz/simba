<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-danger">Pending</span>';
        } else {
            return '<span class="badge badge-success">Aktif</span>';
        }
    }

    public function walikelas() {
        return $this->hasOne(User::class);
    }

}

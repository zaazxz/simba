<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = $model->generateUUID();
        });
        static::updating(function ($model) {
            $model->code = $model->generateUUID();
        });
    }

    public function generateUUID()
    {
        $uuid = (string) Str::uuid();

        if (self::where('code', $uuid)->exists()) {
            return $this->generateUUID();
        }

        return $uuid;
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-danger">Pending</span>';
        } else {
            return '<span class="badge badge-success">Aktif</span>';
        }
    }

    public function walikelas() {
        return $this->belongsTo(User::class, 'walikelas_id', 'id');
    }

    public function mapel() {
        return $this->hasMany(Mapel::class);
    }

}

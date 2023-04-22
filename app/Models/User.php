<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Boot the model
     */
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

    /**
     * Generate UUID
     *
     * @return string
     */
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

    public function getKabkota()
    {
        return $this->belongsTo(Regency::class, 'kabkota', 'id');
    }

    public function getKecamatan()
    {
        return $this->belongsTo(District::class, 'kecamatan', 'id');
    }

    public function getKelurahan()
    {
        return $this->belongsTo(Village::class, 'kelurahan', 'id');
    }
}

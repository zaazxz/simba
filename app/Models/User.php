<?php
namespace App\Models;

use App\Models\Kelas;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'code'
    // ];
    protected $guarded = ['id'];

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

    public function getProvinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'id');
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

    public function kelas() {
        return $this->hasOne(Kelas::class);
    }

    public function mapel() {
        return $this->hasMany(Mapel::class);
    }
}

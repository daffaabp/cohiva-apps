<?php

namespace App\Models;

use App\Models\Konseling;
use App\Models\JadwalKonselor;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Konselor
 *
 * @property $id_konselor
 * @property $nama_konselor
 * @property $notelpon_konselor
 * @property $unit_kerja
 * @property $foto_konselor
 * @property $is_aktif
 *
 * @property Konseling[] $konselings
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Konselor extends Model
{
    protected $table = "konselor"    ;
    protected $primaryKey = "id_konselor";
    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_konselor', 'nama_konselor', 'notelpon_konselor', 'unit_kerja', 'foto_konselor', 'is_aktif', 'id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function konselings()
    {
        return $this->hasMany(Konseling::class, 'id_konselor', 'id_konselor');
    }

    public function jadwalKonselors(){
        return $this->hasMany(JadwalKonselor::class, 'id_konselor', 'id_konselor');
    }


}
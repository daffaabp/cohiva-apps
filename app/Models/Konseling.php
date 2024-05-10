<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Konseling
 *
 * @property $id_konseling
 * @property $tgl_konseling
 * @property $id_pasien
 * @property $id_konselor
 * @property $keterangan
 * @property $status_pasien
 * @property $keluhan
 * @property $penilaian
 * @property $jenis_konseling
 * @property $status_konseling
 *
 * @property Konselor $konselor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Konseling extends Model
{
    protected $table = "konseling";
    protected $primaryKey = "id_konseling";
    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_konseling','tgl_konseling', 'id_pasien', 'id_konselor', 'id_janjikonseling', 'keterangan', 'status_pasien', 'keluhan', 'penilaian', 'jenis_konseling', 'status_konseling'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function konselor()
    {
        return $this->belongsTo(\App\Models\Konselor::class, 'id_konselor', 'id_konselor');
    }
    
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

}

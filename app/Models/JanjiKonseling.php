<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JanjiKonseling
 *
 * @property $id
 * @property $id_jadwalkonselor
 * @property $id_pasien
 * @property $status_janji
 * @property $created_at
 * @property $updated_at
 *
 * @property JadwalKonselor $jadwalKonselor
 * @property Pasien $pasien
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JanjiKonseling extends Model
{

    protected $table = "janji_konseling";


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_jadwalkonselor', 'id_konselor', 'nama_konselor', 'hari', 'jam', 'id_pasien', 'status_janji', 'tgl_janji_konseling'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jadwalKonselor()
    {
        return $this->belongsTo(\App\Models\JadwalKonselor::class, 'id_jadwalkonselor', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien()
    {
        return $this->belongsTo(\App\Models\Pasien::class, 'id_pasien', 'id_pasien');
    }
}
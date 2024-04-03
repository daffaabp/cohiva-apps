<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JadwalKonselor
 *
 * @property $id
 * @property $id_konselor
 * @property $hari
 * @property $jam
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JadwalKonselor extends Model
{
    protected $table = "jadwal_konselor";

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_konselor', 'hari', 'jam', 'status'];

    public function konselor(){
        return $this->belongsTo(Konselor::class, 'id_konselor', 'id_konselor');
    }

}

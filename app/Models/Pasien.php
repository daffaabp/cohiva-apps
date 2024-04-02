<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pasien
 *
 * @property $id_pasien
 * @property $nama_pasien
 * @property $alamat_pasien
 * @property $notelpon_pasien
 * @property $id_user
 * @property $jk_pasien
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pasien extends Model
{
    protected $table = "pasien";
    protected $primaryKey = "id_pasien";
    public $timestamps = false;
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_pasien', 'alamat_pasien', 'notelpon_pasien', 'id_user', 'jk_pasien'];



}

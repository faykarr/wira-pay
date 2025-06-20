<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    protected $table = 'akademik';
    protected $primaryKey = 'id';
    protected $fillable = ['tahun_akademik'];

    /**
     * Get the siswa associated with the akademik.
     */
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'akademik_id');
    }
}

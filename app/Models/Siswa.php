<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nit',
        'nama_lengkap',
        'akademik_id',
        'jurusan_id',
    ];

    public function akademik()
    {
        return $this->belongsTo(Akademik::class, 'akademik_id');
    }

    public function paymentsSummary()
    {
        return $this->hasOne(PaymentsSummary::class, 'siswa_id');
    }

    public function payments()
    {
        return $this->hasMany(Payments::class, 'siswa_id');
    }
}

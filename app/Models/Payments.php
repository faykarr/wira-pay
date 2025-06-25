<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'siswa_id',
        'kode_transaksi',
        'jenis_pembayaran',
        'angsuran',
        'nominal',
        'tanggal_transaksi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}

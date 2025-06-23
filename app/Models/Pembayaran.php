<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'master_pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'akademik_id',
        'registration_fee',
        'spi_fee',
        'spi_fee_per_semester',
    ];

    public function akademik()
    {
        return $this->belongsTo(Akademik::class);
    }
}

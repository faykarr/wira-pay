<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentsSummary extends Model
{
    protected $table = 'payments_summary';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

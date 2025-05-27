<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    protected $table = 'akademik';
    protected $primaryKey = 'id';
    protected $fillable = ['tahun_akademik'];
}

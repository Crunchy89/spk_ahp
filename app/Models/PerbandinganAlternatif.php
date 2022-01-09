<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganAlternatif extends Model
{
    use HasFactory;
    protected $table = 'perbandingan_alternatif';
    protected $fillable = [
        'alternatif1_id', 'alternatif2_id', 'kriteria_id', 'nilai'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahp extends Model
{
    use HasFactory;
    protected $table = 'ahp';
    protected $fillable = [
        'kriteria1_id',
        'kriteria2_id',
        'nilai',
    ];
}

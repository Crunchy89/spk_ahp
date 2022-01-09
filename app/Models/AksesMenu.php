<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesMenu extends Model
{
    use HasFactory;
    protected $table = 'akses_menu';
    protected $fillable = [
        'menu_id', 'role_id'
    ];
}

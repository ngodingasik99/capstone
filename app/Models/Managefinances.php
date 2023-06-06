<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Managefinances extends Model
{
    use HasFactory;
    // protected $table = 'managefinances';
    protected $fillable = [
        'modal'
    ];

    // static function ambildata()
    // {
    //     return DB::select('SELECT * FROM managefinances');
    // }
}

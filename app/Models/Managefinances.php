<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Managefinances extends Model
{
    use HasFactory;
    protected $fillable = [
        'modal',
        'pengeluaran',
        'total_transaction'
    ];

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }

}

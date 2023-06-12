<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'managefinance_id',
        'nama',
        'biaya',
        'foto_nota',
    ];

    public function managefinance()
    {
        return $this->belongsTo(Managefinances::class);
    }
}

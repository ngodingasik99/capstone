<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'kasir_id',
        'product_id',
        'qty',
    ];

    public function user()
    {
        return $this->hasOne('app\Models\User', 'id', 'kasir_id');
    }

    public function product()
    {
        return $this->hasMany('app\Models\Product', 'id', 'product_id');
    }
}

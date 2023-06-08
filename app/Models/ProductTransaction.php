<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    protected $table = 'product_transaction';


    protected $fillable = [
        'transaction_id',
        'qty',
        'product_id',
        'product_name',
        'price',
        'subtotal',
    ];
}

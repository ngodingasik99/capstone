<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_code',
        'total',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class)->using(ProductTransaction::class)->withPivot('product_name', 'price', 'subtotal');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

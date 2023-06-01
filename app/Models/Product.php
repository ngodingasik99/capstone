<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'category_id',
        'description',
        'photo',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    //test chart
    protected function chart()
    {
        $month = date('m');
        // return DB::delete("DELETE FROM carts WHERE id='$data'");
        return DB::select("SELECT COUNT(created_at) AS total, created_at FROM `products` GROUP BY `created_at` HAVING MONTH(created_at) = $month");
    }
    //test chart
}

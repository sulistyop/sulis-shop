<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Cart extends Model
{
    
    protected $table  = 'carts';
    protected $fillable = [
        'id', 'user_id', 'product_id','warna','jumlah','sum_price'
    ];
}

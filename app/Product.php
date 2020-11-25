<?php

namespace App;
use App\Cart;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table  = 'products';
    protected $fillable = [
        'p_name', 'desc', 'price','upload_by','url','category','stock',
    ];

 



}

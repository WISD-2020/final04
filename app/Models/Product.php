<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable =[
        'class',
        'name',
        'price',
        'stocks',
        'status',
        'img',
    ];

    public function orderdetails()
    {
        $this->hasMany(Orderdetail::class);
    }

    public function carts()
    {
        $this->hasMany(Cart::class);
    }
}

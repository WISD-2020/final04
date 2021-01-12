<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';

    protected $fillable = [
        'p_id',
        'price',
        'num',
        'total',
    ];

    public function orders()
    {
        $this->belongsTo(Order::class);
    }

    public function products()
    {
        $this->hasOne(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetails';

    protected $fillable = [
        'o_id',
        'p_id',
        'price',
        'num',
        'total',
    ];

    public function orderlists()
    {
        $this->belongsTo(Orderlist::class);
    }

    public function products()
    {
        $this->hasOne(Product::class);
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'u_id',
        'p_id',
        'price',
        'num',
        'sum',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function products()
    {
        $this->hasMany(Product::class);
    }
}

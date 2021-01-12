<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'u_id',
        'total',
    ];

    public function orderdetails()
    {
        $this->hasMany(Orderdetail::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orderlist;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;

        $carts = DB::table('carts')
            ->join('products', 'carts.p_id', '=', 'products.id')
            ->join('users', 'carts.u_id', '=', 'users.id')
            ->where('carts.u_id', $userid)
            ->select('carts.id',
                'products.name',
                'products.price',
                'products.img',
                'carts.num')
            ->get();

        return view('/cart/index', $carts);
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('/cart/index');
    }

    static public function total()
    {
        $total = 0;
        return $total;
    }

    public function store()
    {

    }
}

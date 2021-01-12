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

        return view('/cart', $carts);
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
}

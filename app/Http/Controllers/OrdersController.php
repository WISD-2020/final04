<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function index()
    {

        $userid = auth()->user()->id;

        $ODs = DB::table('orders')
            ->where('orders.u_id', $userid)
            ->select('orders.id',
                'orders.total',
                'created_at'
            )
            ->get();

        //$userid = auth()->user()->id;
        //$ODs = DB::table('orders')
        //    ->join('orderdetails', 'orders.id', '=', 'orderdetails.o_id')
        //    ->join('products', 'orderdetails.p_id', '=', 'products.id')
        //    ->join('users', 'orders.u_id', '=', 'users.id')
        //    ->where('orders.u_id', $userid)
        //    ->select('orders.id',
        //        'products.img',
        //        'products.name',
        //        'products.price',
        //        'orderdetails.num',
        //        'products.img',
        //        'orders.total')
        //    ->get();

        $data = [
            'ODs' => $ODs
        ];

        return view('order.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $userid = auth()->user()->id;

        $os = new Order();
        $os->u_id = $userid;
        $os->total = $request->input('total');
        $os->save();
        $orders = Order::orderBy('id', 'ASC')->paginate(100);
        $data = [
            'orders' => $orders
        ];

        return view('order.index', $data);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

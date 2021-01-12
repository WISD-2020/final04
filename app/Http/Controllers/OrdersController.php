<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function index()
    {
        return view('/order/index');
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

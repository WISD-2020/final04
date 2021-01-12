<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderdetailsController extends Controller
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

        $ods = new Orderdetail();
        $ods->u_id = $userid;
        $ods->total = $request->input('total');
        $ods->save();
        $orderdetails = Orderdetail::orderBy('id', 'ASC')->paginate(100);
        $data = [
            'orders' => $orderdetails
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

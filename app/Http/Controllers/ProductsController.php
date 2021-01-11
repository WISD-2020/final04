<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('type', 'ASC')->paginate(6);

        $data = [
            'products' => $products,
        ];
        return view('shopping.index', $data);
    }

    public function show(Product $product)
    {
        //$product = Product::find($id);

        $data = [
            'product' => $product,
        ];
        return view('shopping.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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

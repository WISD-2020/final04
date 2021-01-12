<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductlistController extends Controller
{
    public function index()
    {
        $menus = Product::orderBy('type','ASC')->paginate(12);
        $data = [
            'menus' => $menus

        ];
        return view('admin.productlists.index',$data);
    }

    public function create()
    {
        return view('admin.productlists.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->detail = $request->detail;

        $img = $request->file('img');
        $imgname =time().'.'.$img->getClientOriginalExtension();
        if($request->type == "巧克力")
        {
            $request->img->move(public_path('/img/巧克力/'), $imgname);
            $product->img = "img/巧克力/".$imgname;

        }

        $product->price = $request->price;
        $product->type = $request->type;

        $product->save();


        //Product::create($request->all());
        return redirect()->route('admin.menus.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $data = ['product' => $product];

        return view('admin.productlists.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $products->update($request->all());
        return redirect()->route('admin.productlists.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.productlists.index');
    }
}

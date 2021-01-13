<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductlistController extends Controller
{
    public function index()
    {
        $productlists1 = Product::orderBy('class','ASC')->paginate(12);
        $data = [
            'product' => $productlists1

        ];
        return view('admin.productlists.index',$data);
    }

    public function create()
    {
        return view('admin.productlists.create');
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->detail = $request->detail;

        $img = $request->file('img');
        $imgname =time().'.'.$img->getClientOriginalExtension();
        if($request->type == "巧克力")
        {
            $request->img->move(public_path('/img/巧克力/'), $imgname);
            $products->img = "img/巧克力/".$imgname;

        }

        $products->price = $request->price;
        $products->class = $request->class;

        $products->save();


        //Product::create($request->all());
        return redirect()->route('admin.productlists.index');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $data = ['products' => $products];

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

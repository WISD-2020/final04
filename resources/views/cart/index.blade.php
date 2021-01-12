<?php

use App\Http\Controllers\CartsController;
use App\Models\Cart;

$userid = auth()->user()->id;

// index
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


$total = CartsController::total();

?>


@extends('layouts.master')
@section('title','購物車 | final04')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">購物車一覽
            <small></small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('shop')}}">首頁</a>
            </li>
            <li class="breadcrumb-item active">購物車一覽</li>
        </ol>

        <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">

            <table width="100%" border="1">
                <tr align="center">
                    <td><b>商品圖片</b></td>
                    <td><b>商品名稱</b></td>
                    <td><b>單價</b></td>
                    <td><b>數量</b></td>
                    <td><b>小計</b></td>
                    <td><b>操作</b></td>
                </tr>
                @foreach($carts as $cart)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <tr align="center">
                            <td style="width: 100px"><img height="200px" src="{{$cart->img}}"></td>
                            <td>{{$cart->name}}</td>
                            <td style="width: 100px">${{$cart->price}}</td>
                            <td style="width: 100px">{{$cart->num}}</td>
                            <td>{{$cart->num*$cart->price}}</td>
                            <form action="{{route('cart.destroy',$cart->id)}}" method="POST" style="display:inline">
                                @method('delete')
                                @csrf
                                <td class="align-middle" style="width:150px ">

                                    <button type="submit" style="border: 0;background-color: white">移出購物車<i
                                            class="far fa-trash-alt mr-3"></i></button>
                                </td>
                            </form>
                        </tr>
                    </div>
                    <?php $total += $cart->price * $cart->num?>
                @endforeach
            </table>
            <table align="center">
                <td colspan="4"><h1>合計 ${{$total}}</h1></td>
            </table>

        </div>

        <div class="mt-3 d-flex justify-content-end">
            <button class="btn btn-secondary mr-2" style="background-color: white"><a
                    href="{{route('shop.index')}}">繼續選購</a>
            </button>

            @foreach($carts as $cart)
                <form action="{{route('order.store')}}" method="POST" style="display:inline">{{ csrf_field() }}
                    <input type="hidden" name="total" value="{{$cart->price * $cart->num}}">
                    <button type="submit" onclick="return confirm('是否確認結帳?')" class="btn btn-primary">確認結帳</button>
                </form>
            @endforeach
        </div>
    </div>

@endsection

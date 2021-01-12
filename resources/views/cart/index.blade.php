<?php

use App\Http\Controllers\CartsController;
use App\Models\Cart;

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
                </tr>
                @foreach($carts as $cart)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <tr align="center">
                            <td style="width: 100px"><img height="200px" src="{{$cart->img}}"></td>
                            <td>{{$cart->name}}</td>
                            <td>${{$cart->price}}</td>
                            <td>{{$cart->num}}</td>


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
                    href="{{route('shop')}}">繼續選購</a>
            </button>

            <a href="{{route('order').'?cid='.$cart->id}}" onclick="return confirm('是否確認結帳?')" class="btn btn-primary">確認付款</a>
            </form>
        </div>
    </div>

@endsection

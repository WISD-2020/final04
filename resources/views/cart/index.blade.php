<?php

use App\Http\Controllers\CartsController;
use App\Models\Cart;

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

            <table width="100%">

                <tr align="center">
                    <td colspan="4"><h1>合計 ${{$total}}</h1></td>
                </tr>
            </table>
        </div>

        <div class="mt-3 d-flex justify-content-end">
            <button class="btn btn-secondary mr-2" style="background-color: white"><a
                    href="{{route('shop')}}">繼續選購</a>
            </button>

            <button type="submit" onclick="return confirm('是否確認結帳?')" class="btn btn-primary">確認付款</button>
            </form>
        </div>
    </div>

@endsection

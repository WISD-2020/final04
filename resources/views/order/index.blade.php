<?php

use App\Models\Orders;

$userid = auth()->user()->id;
$ODs = DB::table('orders')
    ->where('orders.u_id', $userid)
    ->select('orders.id',
        'orders.total',
        'created_at'
    )
    ->get();

$total = 0;
?>


@extends('layouts.master')
@section('title','商品區 | final04')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">我的訂單
            <small></small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('shop')}}">首頁</a>
            </li>
            <li class="breadcrumb-item active">我的訂單</li>
        </ol>

        <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">

            <table width="100%" border="1">
                <tr align="center">
                    <td width="20%"><b>訂單編號</b></td>
                    <td><b>金額</b></td>
                    <td width="20%"><b>建立時間</b></td>
                </tr>
                @foreach($ODs as $OD)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <tr align="center">
                            <td>{{$OD->id}}</td>
                            <td>${{$OD->total}}</td>
                            <td>{{$OD->created_at}}</td>
                        </tr>
                    </div>

                @endforeach
            </table>
        </div>

    </div>
    <!-- /.container -->
@endsection

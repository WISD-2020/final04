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
                <a href="{{route('welcome')}}">首頁</a>
            </li>
            <li class="breadcrumb-item active">購物車一覽</li>
        </ol>

        <?php
        echo 'http://localhost:8000/cart';
        ?>

    </div>
    <!-- /.container -->
@endsection

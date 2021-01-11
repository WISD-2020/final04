@extends('layouts.master')
@section('title','商品區 | final04')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">巧克力一覽
            <small></small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('welcome')}}">首頁</a>
            </li>
            <li class="breadcrumb-item active">巧克力一覽</li>
        </ol>

        {{--呈現出商品資料--}}
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-auto">
                        <div class="card-body">
                            <p class="card-text"></p>
                            <p class="">
                                <img height="200px" src="{{$product->img}}">
                            </p>
                            <p class="">    {{$product->name}}</p>
                            <p class=""> ${{$product->price}}</p>

                            <a href="{{route('cart').'?gid='.$product->id}}" class="btn btn-primary">加入購物車</a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection

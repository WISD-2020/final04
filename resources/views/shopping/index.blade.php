@extends('layouts.master')
@section('title','商品區 | final04')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">商品
            <small>巧克力一覽</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('welcome')}}">首頁</a>
            </li>
            <li class="breadcrumb-item active">商品區</li>
        </ol>


        <div class="row">
{{--            @foreach($products as $product)--}}
{{--                <div class="col-lg-4 col-sm-6 portfolio-item">--}}
{{--                    <div class="card h-100">--}}
{{--                        <a href="{{route('products.show',$product->id)}}"><img class="card-img-top" src="{{$product->img2}}"  alt=""></a>--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="card-title">--}}
{{--                                <a href="{{route('products.show',$product->id)}}">{{$product->name}}</a>--}}
{{--                            </h4>--}}
{{--                            <p class="card-text"></p>--}}
{{--                            <p class="">${{$product->price}}</p>--}}
{{--                            <p class="">{{$product->type}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @endforeach--}}
        </div>

{{--        <!-- Pagination -->--}}
{{--        {{$products->links('pagination')}}--}}


    </div>
    <!-- /.container -->
@endsection

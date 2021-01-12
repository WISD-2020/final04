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
                <a href="{{route('shop')}}">首頁</a>
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
                            <p class="">
                            <h2>${{$product->price}}</h2></p>
                            <form action="{{route('cart.add')}}" method="post" role="form">
                                @method('post')
                                @csrf
                                <label for="quantity">數量:</label>
                                <select id="num" name="num">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                                <br><br>
                                <input type="hidden" name="p_id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">

                                <button type="submit" onclick="return confirm('是否確認加入購物車?')"
                                        class="btn btn-sm btn-primary" style="height: 50px;width: 200px">加入購物車
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection

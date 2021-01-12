@extends('admin.layouts.master')

@section('title', '商品管理')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                商品管理 <small>所有商品列表</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 商品管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('admin.productlists.create') }}" class="btn btn-success">建立新商品</a>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  style="text-align: center">商品編號</th>
                        <th >商品名稱</th>
                        <th  style="text-align: center">商品內容</th>
                        <th  style="text-align: center">圖片位置</th>
                        <th  style="text-align: center">價格</th>
                        <th  style="text-align: center">商品類別</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td style="text-align: center">{{ $product->id }}</td>
                            <td>{{$product->name}}</td>
                            <td style="text-align: center">{{$product->detail}}</td>
                            <td style="text-align: center">{{$product->img}}</td>
                            <td style="text-align: center">{{$product->price}}</td>
                            <td style="text-align: center">{{$product->type}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.productlists.edit', $menu->id) }}">編輯</a>

                                <form action="/admin/productlists/{{$menu->id}}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('是否確認刪除')">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$menus->links()}}
    </div>

    <!-- /.row -->
@endsection

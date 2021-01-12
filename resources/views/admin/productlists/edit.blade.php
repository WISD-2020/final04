@extends('admin.layouts.master')

@section('title', '編輯商品')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯商品 <small>編輯商品內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 商品管理
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form action="/admin/productlists/{{$product->id}}" method="POST" role="form">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="name">商品名稱：</label>
                    <input name="name" class="form-control" value="{{old('title',$product->name)}}">
                </div>

                <div class="form-group">
                    <label for="detail">商品內容：</label>
                    <textarea id="detail" name="detail" class="form-control" rows="10">{{old('detail',$product->detail)}}</textarea>
                </div>

                <div class="form-group">
                    <label for="img">圖片位置：</label>
                    <input id=img" name="img" class="form-control" rows="10"  value="{{old('img',$product->img)}}">
                </div>

                <div class="form-group">
                    <label for="price">價格：</label>
                    <input id="price" name="price" class="form-control"  value="{{old('price',$product->price)}}">
                </div>

                <div class="form-group">
                    <label for="type">商品類別：</label>
                    <select name="type" id="type">{{old('type',$product->type)}}
                        <option value="單人餐">種類</option>
                    </select>

                </div>


                <div class="text-right">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>

            </form>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection

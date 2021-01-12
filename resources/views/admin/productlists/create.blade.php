@extends('admin.layouts.master')

@section('title', '新增商品')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                新增商品 <small>請輸入商品內容</small>
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
            <form action="/admin/productlists/store" enctype="multipart/form-data"  method="POST" role="form">
                @method("POST")
                @csrf

                <div class="form-group">
                    <label for="class">商品類別：</label>
                    <select name="class" id="class">
                        <option value="巧克力">種類</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">商品名稱：</label>
                    <input id="name" name="name" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="price">價格：</label>
                    <input id="price" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stocks">庫存量：</label>
                    <input id="stocks" name="stocks" class="form-control">
                </div>

                <div class="form-group">
                    <label for="status">上/下架：</label>
                    <input id="status" name="status" class="form-control">
                </div>

                <div class="form-group">
                    <label for="img">圖片位置：</label>
                    <input type = "file" id="img" name="img" class="form-control" >
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success">新增</button>
                </div>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection

@extends('admin.layouts.master')

@section('title', '編輯訂單')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯訂單 <small>編輯訂單內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 訂單管理
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

            @foreach($orderlist as $ordlis)


                <form action="/admin/orderlists/{{$ordlis->orderlists_id}}" method="POST" role="form">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="o_id">訂單編號：</label>
                        <input name="o_id" class="form-control" readonly="readonly" value="{{old('id',$ordlis->o_id)}}">
                    </div>

                    <div class="form-group">
                        <label for="p_id">產品名稱：</label>
                        <input id="p_id" name="p_id" class="form-control"  rows="10"  value="{{old('p_id',$ordlis->p_id)}}">
                    </div>

                    <div class="form-group">
                        <label for="total">單價：</label>
                        <input id="price" name="price" class="form-control"  value="{{old('price',$ordlis->price)}}">
                    </div>

                    <div class="form-group">
                        <label for="num">數量：</label>
                        <input id="num" name="num" class="form-control"  value="{{old('num',$ordlis->num)}}">
                    </div>

                    <div class="form-group">
                        <label for="total">總金額：</label>
                        <input id="total" name="total" class="form-control"  value="{{old('total',$ordlis->total)}}">
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-success">更新</button>
                    </div>
                </form>

            @endforeach

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>
    </div>
    <!-- /.row -->
@endsection

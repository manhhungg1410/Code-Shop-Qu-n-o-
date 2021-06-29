@extends('admin.admin_layout')
@section('content')

    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sửa thông tin loại Sản phẩm
                    </header>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="position-center">
                            <form enctype="multipart/form-data" action="{{route('details_product.update',$details->id)}}" method="post">
                                @csrf
@method('PUT')
                                <div class="form-group">
                                    <label for="ma_sp">Loại sản phẩm</label>
                                    <select name="ma_sp" class="form-control">
                                        @foreach($lsProducts as $products)
                                            <option value="{{$products->id}}" {{$products->id==$details->products_id ? 'selected' : ''}}>{{$products->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="size">Size:</label>
                                    <select name="size" class="form-control">
                                        <option value="S" {{$details->size == 'S' ? 'selected' : ''}}>S</option>
                                        <option value="M" {{$details->size == 'M' ? 'selected' : ''}}>M</option>
                                        <option value="L" {{$details->size == 'L' ? 'selected' : ''}}>L</option>
                                        <option value="XL" {{$details->size == 'XL' ? 'selected' : ''}}>XL</option>
                                        <option value="XXL" {{$details->size == 'XXL' ? 'selected' : ''}}>XXL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="color">Màu sắc:</label>
                                    <input type="text" class="form-control" name="color" value="{{$details->color}}" placeholder="Nhập màu sắc">
                                </div>

                                <div class="form-group">
                                    <label for="amount">Số lượng nhập vào:</label>
                                    <input type="number" class="form-control" name="amount" value="{{$details->amount}}" placeholder="Nhập số lượng nhập vào">
                                </div>


                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('.ckeditor').ckeditor();
                });
            </script>
@endsection



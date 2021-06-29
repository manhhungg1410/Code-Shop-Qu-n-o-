@extends('admin.admin_layout')
@section('content')
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm thông tin Sản phẩm
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
                            <form enctype="multipart/form-data" action="{{route('details_product.store')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="ma_sp">Loại sản phẩm</label>
                                    <select name="ma_sp" class="form-control">
                                        @foreach($lsProducts as $products)
                                            <option value="{{$products->id}}">{{$products->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="size">Size:</label>
                                    <select name="size" class="form-control">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="color">Màu sắc:</label>
                                    <input type="text" class="form-control" name="color"  placeholder="Nhập màu sắc">
                                </div>

                                <div class="form-group">
                                    <label for="amount">Số lượng nhập vào:</label>
                                    <input type="number" class="form-control" name="amount"  placeholder="Nhập số lượng nhập vào">
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

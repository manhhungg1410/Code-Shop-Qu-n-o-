@extends('admin.admin_layout')
@section('content')
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Ảnh chi tiết sản phẩm
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
                            <form enctype="multipart/form-data" action="{{route('product_images.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="ma_sp">Mã sản phẩm:</label>
                                    <select name="ma_sp" class="form-control">
                                        @foreach($lsProducts as $item)
                                            <option value="{{$item->id}}">{{$item->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cover">Ảnh sản phẩm:</label>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>

                    </div>
                </section>

            </div>

@endsection

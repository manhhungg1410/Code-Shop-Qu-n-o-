@extends('admin.admin_layout')
@section('content')
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Sửa Ảnh chi tiết sản phẩm
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
                                @method('PUT')
                                <div class="form-group">
                                    <label for="ma_sp">Mã sản phẩm:</label>
                                    <select name="ma_sp" class="form-control">
                                        @foreach($lsProducts as $item)
                                            <option value="{{$images->products_images_id}}" {{$item->id==$images->products_images_id ? 'selected' : ''}}>{{$item->name_product}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cover">Ảnh sản phẩm:</label>
                                    <input type="file" class="form-control"  id="cover" name="cover">
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>

                    </div>
                </section>

            </div>

@endsection

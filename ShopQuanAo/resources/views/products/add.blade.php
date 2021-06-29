@extends('admin.admin_layout')
@section('content')

    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Sản phẩm
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
                            <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="id">Mã sản phẩm:</label>
                                    <input type="text" class="form-control" name="id"  placeholder="Nhập mã sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="status">Loại sản phẩm</label>
                                    <select name="type" class="form-control">
                                        @foreach($lsDetails as $item)
                                            <option value="{{$item->id}}">{{$item->details_name_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" name="name"  placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="cover">Ảnh sản phẩm:</label>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                </div>
                                <div class="form-group">
                                    <label for="price_old">Giá gốc sản phẩm:</label>
                                    <input type="text" class="form-control" name="price_old"  placeholder="Nhập giá gốc">
                                </div>
                                <div class="form-group">
                                    <label for="sale_off">Sale:</label>
                                    <input type="number" class="form-control" name="sale_off"  placeholder="Nhập giá sau khi giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả:</label>
                                    <textarea rows="5" cols="100"
                                              name="description" class="ckeditor"></textarea>
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

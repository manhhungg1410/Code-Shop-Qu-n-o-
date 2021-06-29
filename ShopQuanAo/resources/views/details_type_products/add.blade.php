@extends('admin.admin_layout')
@section('content')
    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm thông tin loại Sản phẩm
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
                            <form enctype="multipart/form-data" action="{{route('details_type_products.store')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="type">Loại sản phẩm</label>
                                    <select name="type" class="form-control">
                                        @foreach($lsType as $type)
                                            <option value="{{$type->id}}">{{$type->name_type}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">Tên thông tin loại sản phẩm:</label>
                                    <input type="text" class="form-control" name="name_details"  placeholder="Nhập tên loại sản phẩm">
                                </div>

                                <div class="form-group">
                                    <label for="cover">Ảnh sản phẩm:</label>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="0"> Không hiển thị </option>
                                        <option value="1"> Hiển thị </option>
                                    </select>
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

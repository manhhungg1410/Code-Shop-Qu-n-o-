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
                            <form enctype="multipart/form-data" action="{{route('details_type_products.update',$details->id)}}" method="post">
                                @csrf
@method('PUT')
                                <div class="form-group">
                                    <label for="status">Loại sản phẩm</label>
                                    <select name="type" class="form-control">
                                        @foreach($lsType as $type)
                                            <option value="{{$type->id}}" {{$details->type_products_id == $type->id ? 'selected' : ''}}>{{$type->name_type}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">Tên thông tin loại sản phẩm:</label>
                                    <input type="text" class="form-control" name="name_details" value="{{$details->details_name_type}}"  placeholder="Nhập tên loại sản phẩm">
                                </div>

                                <div class="form-group">
                                    <label for="cover">Ảnh sản phẩm:</label>
                                    <input type="file" class="form-control" id="cover" name="cover">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="0" {{$details->status == 0 ? 'selected' : ''}}> Không hiển thị </option>
                                        <option value="1" {{$details->status == 1 ? 'selected' : ''}}> Hiển thị </option>
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

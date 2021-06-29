@extends('admin.admin_layout')
@section('content')

    <div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Loại Sản phẩm
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
                            <form enctype="multipart/form-data" action="{{route('type_product.store')}}" method="post">
                                @csrf
                                <div class="form-group">

                                    <label for="type">Tên loại sản phẩm:</label>
                                    <input type="text" class="form-control" name="type"  placeholder="Nhập tên loại sản phẩm">
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

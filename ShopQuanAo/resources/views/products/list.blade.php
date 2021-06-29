@extends('admin.admin_layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            <div>
                <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>

                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <p class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('success')}}
                        </p>
                    @endif
                        @if(\Illuminate\Support\Facades\Session::has('edit_success'))
                            <p class="alert alert-info">
                                {{\Illuminate\Support\Facades\Session::get('edit_success')}}
                            </p>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('delete_success'))
                            <p class="alert alert-danger">
                                {{\Illuminate\Support\Facades\Session::get('delete_success')}}
                            </p>
                        @endif

                    <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh chính</th>
                        <th>Giá cũ</th>
                        <th>Sale off</th>
                        <th>Mô tả</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lsProducts as $product)

                        <tr data-expanded="true">
                            <td>{{$product->id}}</td>
                            <td>{{$product->details_type_products_id}}</td>
                            <td>{{$product->name_product}}</td>
                            <td><img src="{{$product->cover}}" style="width: 100px;"></td>
                            <td>{{$product->price_old}}</td>
                            <td><span style="color: red;">{{$product->sale_off}}</span></td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a href="{{route('products.show',$product->id)}}"  class="btn btn-info">Views</a>

                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('products.destroy',$product->id)}}"  method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure ?');">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$lsProducts->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

    @endsection

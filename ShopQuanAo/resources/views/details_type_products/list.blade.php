@extends('admin.admin_layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách loại sản phẩm
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

                    @if(\Illuminate\Support\Facades\Session::has('create_success'))
                        <p class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('create_success')}}
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
                        <th>ID</th>
                        <th>Type_ID</th>
                        <th>Tên thông tin loại sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lsDetail as $detail)
                        <tr data-expanded="true">
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->type_products_id}}</td>
                            <td>{{$detail->details_name_type}}</td>
                            <td><img src="{{$detail->cover_details_type}}" width="100" alt=""></td>
                            <td>
                                @if($detail->status == 0)
                                    <span style="color: red;">Không hiển thị</span>
                                @else
                                <span style="color: green">Hiển thị</span>
                                    @endif
                            </td>
                            <td>
{{--                                <a href="{{route('details_type_products.show',$detail->id)}}" class="btn btn-info">Show</a>--}}
                                <a href="{{route('details_type_products.edit',$detail->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('details_type_products.destroy',$detail->id)}}"  method="POST">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure ?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$lsDetail->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection

@extends('admin.admin_layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách ảnh sản phẩm
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
                        <th>Mã sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lsImages as $item)

                        <tr data-expanded="true">
                            <td>{{$item->id}}</td>
                            <td>{{$item->products_images_id}}</td>
                            <td><img src="{{$item->images}}" style="width: 100px;"></td>
                            <td>
                                <a href=""  class="btn btn-info">Views</a>

                                <a href="{{route('product_images.edit',$item->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('product_images.destroy',$item->id)}}"  method="POST">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure ?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$lsImages->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

@endsection

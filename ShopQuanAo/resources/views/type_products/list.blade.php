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

                    @if(\Illuminate\Support\Facades\Session::has('add_success'))
                        <p class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('add_success')}}
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
                        <th>Tên loại sản phẩm</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lsType as $type)
                        <tr data-expanded="true">
                            <td>{{$type->id}}</td>
                            <td>{{$type->name_type}}</td>
                            <td>
                                <a href="{{route('type_product.edit',$type->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('type_product.destroy',$type->id)}}"  method="POST">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure ?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$lsType->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>

@endsection

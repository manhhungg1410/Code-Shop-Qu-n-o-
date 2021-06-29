@extends('frontend.content')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tài khoản thành viên</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Tài khoản thành viên</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Sửa thông tin khách hàng</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="font-size: 18px;font-family: Arial;color: red">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <p style="color: green" class="alert alert-success">
                                {{\Illuminate\Support\Facades\Session::get('success')}}
                            </p>
                            @endif
                        <form class="needs-validation" action="{{route('update_guest',$guests->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Họ tên</label>
                                    <input type="text" class="form-control" value="{{$guests->first_name}}" name="first_name" id="firstName" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Tên</label>
                                    <input type="text" class="form-control" name="last_name" id="lastName" value="{{$guests->last_name}}" required>
                                </div>
                            </div>
                            <div class="title"> <span>Giới tính</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="man" name="gender" type="radio" class="custom-control-input" value="Nam" {{$guests->gender=="Nam" ? 'checked' : ''}} required>
                                    <label class="custom-control-label" for="man">Nam</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="woman" name="gender" type="radio" value="Nữ" {{$guests->gender=="Nữ" ? 'checked' : ''}}  class="custom-control-input" required>
                                    <label class="custom-control-label" for="woman">Nữ</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="birthDay">Ngày sinh:</label>
                                <input type="date" class="form-control" id="birthDay" value="{{$guests->birthday}}"
                                       name="birthDay">
                            </div>

                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" value="{{$guests->address}}" class="form-control" id="address" placeholder="Nhập địa chỉ" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" class="form-control" id="phone" value="{{$guests->phone}}"
                                       name="phone" placeholder="Nhập số điện thoại">
                            </div>



                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-warning">Sửa</button>
                                <a href="{{route('details_guest')}}" class="btn btn-outline-dark">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="{{asset('frontend/images/about-img.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart -->
    @endsection

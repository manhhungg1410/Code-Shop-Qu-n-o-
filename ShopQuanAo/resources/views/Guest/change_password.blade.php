@extends('frontend.content')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tài khoản khách hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">{{\Illuminate\Support\Facades\Auth::guard('guests')->user()->first_name}} {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->last_name}}</li>
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
                            <h3>Đổi mật khẩu</h3>
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
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <p style="color: red" class="alert alert-danger">
                                {{\Illuminate\Support\Facades\Session::get('error')}}
                            </p>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('cf_ps'))
                            <p style="color: green" class="alert alert-success">
                                {{\Illuminate\Support\Facades\Session::get('cf_ps')}}
                            </p>
                        @endif
                        <form class="needs-validation" action="{{route('confirm_password',\Illuminate\Support\Facades\Auth::guard('guests')->user()->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password">Nhập mật khẩu cũ:</label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
                            </div>

                            <div class="mb-3">
                                <label for="new_password">Nhập mật khẩu mới:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>

                            <div class="mb-3">
                                <label for="cf_password">Nhập lại mật khẩu mới:</label>
                                <input type="password" class="form-control" id="cf_password" name="cf_password">
                            </div>



                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-outline-secondary">Đổi mật khẩu</button>
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

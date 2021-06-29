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

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->


    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Đăng ký</h3>
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
                        @if(\Illuminate\Support\Facades\Session::has('cf_ps'))
                            <p class="alert alert-danger" style="color: red;">
                              {{\Illuminate\Support\Facades\Session::get('cf_ps')}}
                            </p>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <p class="alert alert-success" style="color: green;">
                                {{\Illuminate\Support\Facades\Session::get('success')}}
                            </p>
                        @endif
                        <form class="needs-validation" action="{{route('check_register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Họ tên</label>
                                    <input type="text" class="form-control" name="first_name" id="firstName" placeholder="Nhập họ tên" value="" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Tên</label>
                                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Nhập tên" value="" required>
                                </div>
                            </div>
                            <div class="title"> <span>Giới tính</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="man" name="gender" type="radio" class="custom-control-input" value="Nam" checked required>
                                    <label class="custom-control-label" for="man">Nam</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="woman" name="gender" type="radio" value="Nữ" class="custom-control-input" required>
                                    <label class="custom-control-label" for="woman">Nữ</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="birthDay">Ngày sinh:</label>
                                <input type="date" class="form-control" id="birthDay"
                                       name="birthDay">
                            </div>

                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" class="form-control" id="phone"
                                       name="phone" placeholder="Nhập số điện thoại">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                            </div>


                            <div class="mb-3">
                                <label for="cf_password">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="cf_password" name="cf_password" placeholder="Nhập lại mật khẩu">
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address" name="check">
                                <label style="color: red;" class="custom-control-label" for="same-address">Tôi đồng ý với các điều kiện của cửa hàng.</label>
                            </div>

                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-warning">Đăng ký</button>
                            </div>
                             </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Đăng nhập</h3>
                                </div>
                                @if(\Illuminate\Support\Facades\Session::has('login_fail'))
                                    <p class="alert alert-danger" style="color: red">
                                        {{\Illuminate\Support\Facades\Session::get('login_fail')}}
                                    </p>
                                    @endif
                                <div class="mb-4">
                                    <form class="needs-validation" action="{{route('check_login')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="remember" name="remmemberMe">
                                            <label class="custom-control-label" for="remember" style="color: red;">Nhớ tôi!</label>
                                        </div>

                                        <div class="form-group" align="center">
                                           <button type="submit" class="btn btn-success">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-01.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-02.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-03.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-04.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-06.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-07.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-08.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-09.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('frontend/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

@endsection

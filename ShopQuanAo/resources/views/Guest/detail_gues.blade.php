@extends('frontend.content')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tài khoản khách hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item" style="color: white;">Xin chào</li>
                        <li class="breadcrumb-item active">{{\Illuminate\Support\Facades\Auth::guard('guests')->user()->first_name}} {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->last_name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="noo-sh-title">Xin chào  <span> {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->last_name}}</span></h2>
                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <p style="color: red" class="alert alert-danger">
                            {{\Illuminate\Support\Facades\Session::get('error')}}
                        </p>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <p style="color: green" class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('success')}}
                        </p>
                    @endif

                    <p>
                        <strong>Họ tên:</strong>
                        {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->first_name}} {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->last_name}}
                    </p>
                    <p>
                        <strong>Email:</strong>
                        {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->email}}
                    </p>
                    <p>
                        <strong>Giới tính:</strong>
                        {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->gender}}
                    </p>
                    <p>
                        <strong>Ngày sinh:</strong>
                        {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->birthday}}
                    </p>
                    <p>
                        <strong>Địa chỉ:</strong>
                        {{\Illuminate\Support\Facades\Auth::guard('guests')->user()->address}}
                    </p>
                    <p>
                        <strong>Số điện thoại:</strong>
                        0{{\Illuminate\Support\Facades\Auth::guard('guests')->user()->phone}}
                    </p>
                    <a href="{{route('edit_guest',\Illuminate\Support\Facades\Auth::guard('guests')->user()->id)}}" class="btn btn-outline-success">Chỉnh sửa thông tin cá nhân</a>
                    <a href="{{route('change_password',\Illuminate\Support\Facades\Auth::guard('guests')->user()->id)}}" class="btn btn-outline-dark">Đổi mật khẩu</a>
                    <p>
                        <strong>Số sản phẩm đã mua tại shop:</strong>
                        1
                    </p>
                    <p>
                        <strong><i>Bạn sắp có 1 phần quà đặc biệt tới từ shop với số lần mua hàng của mình. Hãy tích cực mua thêm nhé !!</i></strong>
                    </p>

                </div>
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="{{asset('frontend/images/about-img.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Trusted</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Professional</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Expert</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Meet Our Team</h2>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-1.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Williamson</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-2.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Kristiana</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-3.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Steve Thomas</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="images/img-1.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title">Williamson</h3> <span class="post">Web Developer</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->


@endsection

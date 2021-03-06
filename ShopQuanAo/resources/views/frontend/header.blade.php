<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Miễn phí vận chuyển với những đơn hàng có giá trị trên 500k
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Ưu đãi đặc biệt cho ngày đặc biệt
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm giá cho tất cả sản phẩm tại Shop
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Mua 1 tặng 1 cho lần đầu mua hàng tại Shop
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="VNĐ">
                        <option>€ VNĐ</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Gọi ngay :- <a href="#"> 096 554 0180</a></p>
                </div>
                @if(\Illuminate\Support\Facades\Auth::guard('guests')->check())
                    <div class="our-link">
                        <ul>
                            <li>Xin chào <a href="{{route('details_guest')}}">{{\Illuminate\Support\Facades\Auth::guard('guests')->user()->last_name}}</a></li>
                            <li><a href="{{route('logout_guests')}}">Đăng xuất</a></li>
                        </ul>
                    </div>
               @else
                <div class="our-link">
                    <ul>
                        <li><a href="{{route('login_guest')}}">Đăng nhập</a></li>
                        <li><a href="{{route('login_guest')}}">Đăng ký</a></li>
                        <li><a href="#">Liên hệ với chúng tôi</a></li>
                    </ul>
                </div>
                 @endif
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/images/logo.png')}}" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="{{route('home_page')}}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">Về chúng tôi</a></li>
                    <li class="dropdown megamenu-fw">
                        <a href="" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Sản phẩm</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    @foreach($lsTypeProducts as $item)
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">{{$item->name_type}}</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                @foreach($item->details as $category)
                                                <li><a href="{{route('products',$category->id)}}">{{$category->details_name_type}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                    <!-- end col-3 -->
                                </div>
                                <!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                        <ul class="dropdown-menu">
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="shop-detail.html">Shop Detail</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="service.html">Dịch vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Liên hệ</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu"><a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
                        </a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <li>
                        <a href="#" class="photo"><img src="{{asset('frontend/images/img-pro-01.jpg')}}" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Delica omtantur </a></h6>
                        <p>1x - <span class="price">$80.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="{{asset('frontend/}images/img-pro-02.jpg')}}" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Omnes ocurreret</a></h6>
                        <p>1x - <span class="price">$60.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="{{asset('frontend/images/img-pro-03.jpg')}}" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Agam facilisis</a></h6>
                        <p>1x - <span class="price">$40.00</span></p>
                    </li>
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        <span class="float-right"><strong>Total</strong>: $180.00</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

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

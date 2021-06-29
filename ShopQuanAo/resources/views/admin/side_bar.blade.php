
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Danh sach san pham -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('products.index')}}">List Products</a></li>
                        {{--                        <li><a href="{{route('posts.create')}}">Thêm danh sách Post</a></li>--}}
                        <li><a href="{{route('products.create')}}">Add Products</a></li>

                    </ul>
                </li>

                <!-- Chi tiet san pham -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Details Products</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('details_product.index')}}">List Details Products</a></li>
                        {{--                        <li><a href="{{route('posts.create')}}">Thêm danh sách Post</a></li>--}}
                        <li><a href="{{route('details_product.create')}}">Add Details Products</a></li>

                    </ul>
                </li>

                <!-- Loai san pham -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Type Products</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('type_product.index')}}">List Type Products</a></li>
                        {{--                        <li><a href="{{route('posts.create')}}">Thêm danh sách Post</a></li>--}}
                        <li><a href="{{route('type_product.create')}}">Add Type Products</a></li>

                    </ul>
                </li>

                <!-- Chi tiet loai san pham -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Details Type Products</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('details_type_products.index')}}">List Details Type Products</a></li>
                        {{--                        <li><a href="{{route('posts.create')}}">Thêm danh sách Post</a></li>--}}
                        <li><a href="{{route('details_type_products.create')}}">Add Details Type Products</a></li>

                    </ul>
                </li>

                <!-- Anh san pham -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Details Images Products</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('product_images.index')}}">List Details Images Products</a></li>
                        {{--                        <li><a href="{{route('posts.create')}}">Thêm danh sách Post</a></li>--}}
                        <li><a href="{{route('product_images.create')}}">Add Details Images Products</a></li>

                    </ul>
                </li>



            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->


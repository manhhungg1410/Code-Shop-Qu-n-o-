<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Shop</title>
    @include('admin.css')
</head>
<body>
<section id="container">
@include('admin.header')
@include('admin.side_bar')
<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- //market-->
@yield('content')

        </section>
        <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="">Mạnh Hùng</a></p>

            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
@include('admin.js')
</body>
</html>

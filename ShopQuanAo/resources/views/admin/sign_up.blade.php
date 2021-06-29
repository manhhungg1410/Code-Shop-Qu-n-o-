<!doctype html>
<html lang="en">
<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('admin_web/css/style.css')}}">

</head>
<body class="img js-fullheight" style="background-image: url({{asset('admin_web/images/bg.jpg')}});">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Register Admin</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">

                    <form action="{{route('check_signup')}}" class="signin-form" method="post">
                        @csrf
                        @if(\Illuminate\Support\Facades\Session::has('fail'))
                            <p class="alert alert-danger" style="color: red;">
                                {{\Illuminate\Support\Facades\Session::get('fail')}}
                            </p>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="font-size: 18px;font-family: Arial;color: red">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="cf_password" class="form-control" placeholder="Confirm Password" required>
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                    </form>
                    <p class="w-100 text-center">&mdash; Do you already have an account? Login now!! &mdash;</p>
                    <div class="social d-flex text-center">
                        <a href="{{route('login')}}" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('admin_web/js/jquery.min.js')}}"></script>
<script src="{{asset('admin_web/js/popper.js')}}"></script>
<script src="{{asset('admin_web/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_web/js/main.js')}}"></script>

</body>
</html>


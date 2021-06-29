<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        @foreach($lsType as $type))
        <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$type->name_type}}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach($type->details as $check)
                    <li><a href="#">{{$check->details_name_type}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        @endforeach
    </div>
</nav>

</body>
</html>

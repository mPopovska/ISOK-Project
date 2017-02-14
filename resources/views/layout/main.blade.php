<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body{
            margin: auto;
        }
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 100%;
            margin: auto;
        }
        #myCarousel {
            width: 75%;
            margin: auto;
        }
    </style>
</head>
<body>
    @include('layout.header')
    @yield('carousel')
    <br><br><br>
    @yield('subcontent1')
</body>
</html>
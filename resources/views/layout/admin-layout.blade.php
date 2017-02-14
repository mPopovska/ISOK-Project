<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        .nav{
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <ul class="nav nav-tabs">
        <li><a href="/admin/insert-device">Внеси уред</a></li>
        <li><a href="/admin/review-comments">Прегледај коментари</a></li>
    </ul>

    @yield('reviews-list')

    @yield('insert-device')
</body>
</html>
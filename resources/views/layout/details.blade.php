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

        .row{
            margin-top: 70px;
        }

        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: "/ ";
            padding: 0 5px;
        }

        .center{
            text-align: center;
        }

    </style>
</head>
<body>
@include('layout.header')
<div class="container">
    @yield('breadcrumbs')

    <div class="row">
        <div class="col-sm-6">
            @yield('phone_info')
        </div>
        <div class="col-sm-6">
            @yield('main_content')
        </div>
    </div>

    <div class="row">
        @yield('write_phone_review')
    </div>

    <div class="row">
        @yield('phone_reviews')
    </div>
</div>
</body>
</html>
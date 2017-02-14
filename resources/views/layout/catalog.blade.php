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

    <!-- Material design -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-red.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    </style>
</head>
<body>
    @include('layout.header')
    <div class="container">
        @yield('breadcrumbs')

        <div class="row">
            <div class="col-sm-2">
                @yield('filter')
            </div>
            <div class="col-sm-10">
                @yield('main_content')
            </div>
        </div>
    </div>
</body>
</html>
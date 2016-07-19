<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{--龙魂---}}管理{{--SB Admin - Bootstrap Admin Template--}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/sb-admin 1.0.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="/sb-admin 1.0.4/css/sb-admin.css" rel="stylesheet">
    {{--<link href="/sb-admin 1.0.4/css/bootstrap-rtl.min.css" rel="stylesheet">--}}
    {{--<link href="/sb-admin 1.0.4/css/sb-admin-rtl.css" rel="stylesheet">--}}
    <link href="/sb-admin 1.0.4/css/plugins/morris.css" rel="stylesheet">
    <link href="/sb-admin 1.0.4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        div { font-family:"微软雅黑"; }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        @include('admin.layout.header')
        @include('admin.layout.left')
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid" style="height:800px;overflow:auto;">
            @include('admin.layout.crumb')
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/sb-admin 1.0.4/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/sb-admin 1.0.4/js/bootstrap.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="/sb-admin 1.0.4/js/plugins/morris/raphael.min.js"></script>
<script src="/sb-admin 1.0.4/js/plugins/morris/morris.min.js"></script>
<script src="/sb-admin 1.0.4/js/plugins/morris/morris-data.js"></script>
</body>
</html>
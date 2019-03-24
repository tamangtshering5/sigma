<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sigma Travel! | </title>

    <!-- Bootstrap core CSS -->

    <link href="{{URL::to('backend/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::to('backend/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('backend/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{URL::to('backend/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::to('backend/css/maps/jquery-jvectormap-2.0.3.css')}}" />
    <link href="{{URL::to('backend/css/icheck/flat/green.css')}}" rel="stylesheet" />
    <link href="{{URL::to('backend/css/floatexamples.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('backend/css/panel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('backend/css/card.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{URL::to('backend/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('backend/js/nprogress.js')}}"></script>

    <!--[if lt IE 9]>
<!--
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
-->
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Sigma Travel!</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{URL::to('backend/images/profile_image/'.Auth::user()->image)}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />
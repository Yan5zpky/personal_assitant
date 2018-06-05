<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/moment.js/2.21.0/moment.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker();
        // $("input[name='deadline']").datepicker({
        //    dateFormat:'yyyymmdd',
        //    startDate: '-3d'
        // });
    </script>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--

    Urbanic Template

    http://www.templatemo.com/tm-395-urbanic

    -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->

    <!-- Google Web Font Embed -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
    <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <script src="js/stickUp.min.js"  type="text/javascript"></script>
    <script src="js/colorbox/jquery.colorbox-min.js"  type="text/javascript"></script>
    <script src="js/templatemo_script.js"  type="text/javascript"></script>
    <![endif]-->
</head>
<body id="app-layout">
<div class="templatemo-top-bar" id="templatemo-top">
    <div class="container">
        <div class="subheader">
            <div id="phone" class="pull-left">
                <img src="images/phone.png" alt="phone"/>
                +86 19921030137
            </div>
            <div id="email" class="pull-right">
                <img src="images/email.png" alt="email"/>
                yanloveky@gmail.com
            </div>
        </div>
    </div>
</div>
<div class="templatemo-top-menu">
    <div class="container">
        <!-- Static navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"><img src="images/templatemo_logo.png" alt="Urbanic Template" title="Urbanic Template" /></a>
                </div>
                <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                    <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                        <li><a href="/">HOME</a></li>
                        @if (Auth::guest())
                        <li><a href="/login">LOGIN</a></li>
                        <li><a href="/register">REGISTER</a></li>
                        @else
                        <li><a href="/articles-lists">ARTICLES</a></li>
                        <li><a href="/issues-deadline">ISSUES</a></li>
                        <li><a href="/logout">LOG OUT</a></li>
                        @endif
                        <li><a href="https://github.com/Yan5zpky/personal_assitant">GITHUB</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </div><!--/.navbar -->
    </div> <!-- /container -->
</div>
{{--<nav class="navbar navbar-default navbar-static-top">--}}
    {{--<div class="container">--}}
        {{--<div class="navbar-header">--}}

            {{--<!-- Collapsed Hamburger -->--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                {{--<span class="sr-only">Toggle Navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
        {{--</div>--}}

        {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
            {{--<!-- Left Side Of Navbar -->--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li><a href="{{ url('/') }}">Home</a></li>--}}
            {{--</ul>--}}

            {{--<!-- Right Side Of Navbar -->--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<!-- Authentication Links -->--}}
                {{--@if (Auth::guest())--}}
                    {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                    {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                {{--@else--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}

@yield('content')

</body>
</html>
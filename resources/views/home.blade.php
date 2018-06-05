<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Personal Website</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>



@extends('layouts.app')

@section('content')
    <div>
        <!-- Carousel -->
        <div id="templatemo-carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#alatemo-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#templatemo-carousel" data-slide-to="1"></li>
                <li data-target="#templatemo-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>PERSONAL ASSISTENT WEBSITE</h1>
                            <p>START WITH YOUR THOUGHTS</p>
                            <p><a class="btn btn-lg btn-green" href="/articles-lists" role="button" style="margin: 20px;">Write Article</a>
                                <a class="btn btn-lg btn-orange" href="/issues-deadline" role="button">Issues Remind</a></p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="col-sm-6 col-md-6">
                                <h1>ARTICLES</h1>
                                <p>Our website provides powerful text editor so that you can store everthing in your article and share your idea.</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h1>ISSUES</h1>
                                <p>Our website provides free mail service and remind you of your important issues every day.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Open Source</h1>
                            <p>This website can be used for everyone.</p>
                            <p><a class="btn btn-lg btn-orange" href="https://github.com/Yan5zpky/personal_assitant" target="_blank" role="button">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#templatemo-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#templatemo-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><!-- /#templatemo-carousel -->
    </div>
    <div class="templatemo-welcome" id="templatemo-welcome">
        <div class="container">
            <div class="templatemo-slogan text-center">
                <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">Laravel</span>
                <p class="txt_slogan"><i>Share you idea with everyone.</i></p>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
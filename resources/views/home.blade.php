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
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <a href="{{ url('articles-lists') }}" class="btn btn-lg btn-success col-xs-12">搜索文章</a>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('issues-deadline') }}" class="btn btn-lg btn-success col-xs-12">查看事务</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
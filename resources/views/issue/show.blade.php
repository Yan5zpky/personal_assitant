<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div id="content" style="padding: 50px;">

    <h4>
        <a href="/home"><< 返回首页</a>
    </h4>

    <h1 style="text-align: center; margin-top: 50px;">{{ $issue->title }}</h1>
    <hr>
    <div id="date" style="text-align: right;">
        {{ $issue->deadline }}
    </div>
    <div id="content" style="margin: 20px;">
        <p>
            {{ $issue->location }}
        </p>
    </div>


</div>

</body>
</html>
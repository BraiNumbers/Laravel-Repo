<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bryan Kreeft</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login') && Auth::check())
                <div class="top-right links">
                    <a href="{{ url('/projects') }}">Projects</a>
                    <a href="{{ url('/posts') }}">Posts</a>
                </div>
            @elseif (Route::has('login') && !Auth::check())
                <div class="top-right links">
                    <a href="{{ url('/projects') }}">Projects</a>
                    <a href="{{ url('/posts') }}">Posts</a>
                    <a href="{{ url('/login') }}">Login</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bryan Kreeft
                </div>
                <a href="https://www.linkedin.com/in/bryan-k-8b5860208/?originalSubdomain=nl" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/bc555db243.js" crossorigin="anonymous"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Haloboard</title>

        <!-- Scripts -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.0/lottie.js'></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/projects') }}" class="text-right">Projects</a>
                    @else
                        <a href="{{ route('login') }}" class="text-right">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-right">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title text-sm-left">
                    HALOBOARD
                </div>

                <div class="bodymovin-wrapper">
                    <div class="bodymovin">
                    
                    </div>
                </div>
                
            </div>
        </div>

        <script>
            var loader = document.getElementsByClassName("bodymovin");
            function loadBMAnimation(loader) {
            var animation = bodymovin.loadAnimation({
            container: loader,
            renderer: "svg",
            loop: true,
            autoplay: true,
            path: "https://gist.githubusercontent.com/onojatreasure/b0dc35ce2d3feb99bee097a87ad15231/raw/bf24b72bce50d79f3479d52a8a3643ce59dee691/animation.json"
            });
            }
            for (var i = 0; i < loader.length; i++) {
            loadBMAnimation(loader[i]);
            }
        </script>
    </body>
</html>

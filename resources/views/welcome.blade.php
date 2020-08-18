<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Biryani&display=swap');
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                overflow: hidden;
            }
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
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
                z-index:999999;
            }

            .content {
                text-align: center;
            }

            .title {
                
                position: relative;
                width: 100vw;
                height: 95vh;
                
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .title h1{
                font-family: 'Biryani', sans-serif;
                font-weight: 800;
                font-size: 60px;
                z-index:9999;
                font-weight:bold;
                text-transform: uppercase;
                /* -webkit-text-stroke: 3px linear-gradient(to right, #e5405e 0%, #e5405e 15%, rgba(46,2014,113,0.8) 30%, rgba(39,174,96,0.3)45%,#3fffa2 60%, #1a9be0 73%, #ba68ed 100%);
	            -webkit-text-fill-color: white; */
                background: -webkit-linear-gradient(-86deg, #EEF85B 5%, #7AEC8D 53%, #09E5C3 91%);
                -webkit-background-clip: text;
                -webkit-text-stroke: 4px transparent;
                /* color: #232d2d; */
                color: #3b5441;
            }
                   
            
            /* Warning: no fallback */
            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border: 1px solid black;
                border-radius:50px;
                padding:10px 10px;
                margin-left:20px;
                background: linear-gradient(to right, #5d5d5a 50%, transparent 50%);
                background-size: 200% 100%;
                background-position:left bottom;
                margin-left:10px;
                transition:all 0.3s ease;
            }
            .links > a:hover{   
                background-position:right bottom;
                color:black;
            }
            
            .m-b-md {
                margin-bottom: 30px;
            }
            .video{
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;

            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <h1>Project Management System</h1>
                    <div class="video">
                        <video autoplay loop muted>
                            <source src="{{ asset('assets/videos/back.mp4') }}" type="video/mp4" />
                        </video>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>

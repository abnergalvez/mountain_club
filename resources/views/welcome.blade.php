<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            body{
                background: url("{{url('img/piramide.jpg')}}") no-repeat center center fixed;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <!--<a href="{{ url('/register') }}">Register</a>-->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    CLUB<br> ANDINO<br>  PIRAMIDE
                </div>

                <div class="col-md-12" style="margin-top:10px;">

                    <h3>Contactanos!</h3>
                    <form class="form" action="/contacts" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                          <label>Asunto o Tema</label>
                          <input type="text" class="form-control" name="subject" placeholder="Asunto" required>
                        </div>
                        <div class="form-group">
                          <label>Mensaje</label>
                          <textarea class="form-control" rows="5" name="message"></textarea>
                        </div>
                          <button type="submit" class="btn pull-right btn-success">Enviar!</button>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>

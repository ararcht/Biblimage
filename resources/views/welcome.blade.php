<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BIBLIMAGE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
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
                position:fixed;
                width: 100%;
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

            .links {
                padding: 50px;
                background-color: black;
                width: 100%;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #slide1 {
                background: url({{ asset('img_web/image1.jpg') }}) center 0 no-repeat fixed;
            }

            #slide2 {
                background: url({{ asset('img_web/image5.jpg') }}) center 0 no-repeat fixed;
            }

            #slide3 {
                background: url({{ asset('img_web/image6.jpg') }}) center 0 no-repeat fixed;
            }
            #slide1, #slide2, #slide3 {
                height: 625px;

            }
            /* Gestion du contenu */
            .slide_inside {
                width: 980px;
                margin: 0 auto;
                color: white;
                font-weight: bold;
                background-color: none;
                font-size: 30px;
                padding-top: 20%;

            }

            #slide1  .slide_inside {
                text-align:center;

            }

            #slide2 .slide_inside p {
                width: 500px;
                text-align:justify;
            }

            #slide3 .slide_inside {


            }
            .content {
                padding-top: 115px;
            }
            .background{
                background-color: rgba(0, 0, 0, 0.35);
                height:100%;
            }
            .textwhite {
                color:white !important;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-reft">
            @if (Route::has('login'))
                <div class="links">
                    @if (Auth::check())
                        <a href="{{ url('#') }}">Accueil</a>
                        <a href=" {{ route('images.index') }}">Flux d'images</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="pull-right" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Déconnexion
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </a>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>
                        <a href="{{ route('register') }}">S'incrire</a>


                    @endif
                </div>
            @endif


        </div>

        <div class="content">

        <div id="slide1">
            <div class="background">
                    <div class="slide_inside"> Bienvenue !
                        <br>
                        Vous pourrez stocker ici toutes vos photos...
                    </div>
            </div>
        </div>
        <div id="slide2">
            <div class="background">
            <div class="slide_inside">
                ...Afin de les partager avec vos amis !
            </div>
            </div>
        </div>
        <div id="slide3">
            <div class="background">
            <div class="slide_inside">
                Cliquez sur "flux de d'images" afin d'accèder aux photos de toute la communauté !
            </div>
            </div>
        </div>
        </div>

   <!--     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
        <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#slide1').parallax("center", 0, 0.1, true);
            $('#slide2').parallax("center", 900, 0.1, true);
            $('#slide3').parallax("center", 2900, 0.1, true);
        })
    </script> -->
    </body>
</html>

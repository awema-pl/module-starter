<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="{{_p('starter::pages.welcome.meta_description', 'E-commerce solutions for individual orders. Take advantage of applications designed by sellers. Order the creation of dedicated software.')}}">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="{{asset('assets/awema-pl/starter/css/main.css')}}" rel="stylesheet">
</head>
<body>

<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{asset('assets/awema-pl/starter/mp4/bg.mp4')}}" type="video/mp4">
</video>
<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <h1 class="mb-3">{{config('app.name')}}</h1>
                    <p class="mb-5">{{_p('starter::pages.welcome.description', 'E-commerce solutions for individual orders. Take advantage of applications designed by sellers. Order the creation of dedicated software.')}}</p>
                    <div class="input-group input-group-newsletter">
                    @if(!Auth::check())
                            <a class="btn btn-secondary px-4 py-2" href="{{route('register')}}">{{_p('starter::pages.welcome.register', 'Sign up')}}</a>
                            <a class="btn btn-info px-4 py-2 ml-4" href="{{route('login')}}">{{_p('starter::pages.welcome.login', 'Sign in')}}</a>
                        @else
                            <a class="btn btn-info px-4 py-2" href="{{route(config('starter.routes.home.name_prefix') . 'index')}}">{{_p('starter::pages.welcome.go_to_panel', 'Go to the panel')}}</a>
                          @endif
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
            <a href="{{config('starter.socials.facebook')}}" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="list-unstyled-item">
            <a href="{{config('starter.socials.youtube')}}" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
        </li>
    </ul>
</div>
<script src="{{asset('assets/awema-pl/starter/js/main.js')}}"></script>
</body>
</html>

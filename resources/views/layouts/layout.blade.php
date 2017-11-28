<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>ICT-Hulp</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/font-awesome.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/ict-hulp.css') !!}">
    <script src='https://www.google.com/recaptcha/api.js'></script>


    <script>
        window.App = {!! json_encode([
            'csrfToken'=> csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
</head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom z-depth-half">
        <div class="container">


            <a class="navbar-brand" href="{{ route('home')  }}">
                <i class="fa fa-skype"></i>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('showQuestions') }}" class="nav-link">Vragen</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('showCompanies') }}" class="nav-link">Aanbieders</a>
                    </li>
                </ul>

                <form class="form-inline">
                    {{ csrf_field() }}
                    <input class="form-control search-input" type="search" placeholder="Zoeken..." name="search" id="search">
                    <button class="btn btn-search btn-hover" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

                <ul class="navbar-nav">

                    @if(Auth::check())
                    <li class="nav-item dropdown icondropdown">
                        <a href="#" class="nav-link">
                            <i class="fa fa-envelope-o navbar-icons" aria-hidden="true"></i><span class="noti-navbar-badge">5</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown icondropdown " id="notification-dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o navbar-icons" aria-hidden="true"></i><span class="noti-navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-center z-depth-1" aria-labelledby="navbarDropdown" style="width: 300px;  padding-bottom: 0;  top: 70px;  border: none;  padding-top: 5px;  border-radius: 7px;">
                            <span class="triangle"></span>
                            <a class="dropdown-item dropdown-title">
                                <span class="heading">Notificatie's</span><span class="float-right" style="font-size: 14px;">Instellingen</span>
                            </a>

                            <div class="dropdown-divider m-0"></div>

                            <div class="dropdown-item dropdown-item-style is-active">
                                <div class="notification-image-wrapper">
                                    <div class="notification-image">
                                        <img src="#" class="rounded-circle" width="32">
                                    </div>
                                </div>

                                <div class="notification-text ng-binding">
                                    <span class="highlight" style="line-break: auto">Rainier laan</span> <span class="more-info">heeft gereageert op je bericht.</span><br>
                                    <i class="fa fa-comment-o color-icons"></i> <small class="text-muted">5 Dagen geleden</small>
                                </div>
                                <!--<p style="color: grey; word-wrap: break-word"><b style="color: grey">Rainier laan</b> heeft gereageert op je bericht.</p>-->
                            </div>

                            <div class="dropdown-divider m-0" style="border-color: lightgrey"></div>

                            <div class="dropdown-item dropdown-item-style" href="#">
                                <div class="notification-image-wrapper">
                                    <div class="notification-image">
                                        <img src="#" class="rounded-circle" width="32">
                                    </div>
                                </div>

                                <div class="notification-text ng-binding">
                                    <span class="highlight" style="line-break: auto">Johan Strootman</span> <span class="more-info">heeft gereageert op je bericht.</span><br>
                                    <i class="fa fa-comment-o color-icons"></i> <small class="text-muted">5 Dagen geleden</small>
                                </div>
                            </div>

                            <div class="dropdown-divider m-0" style="border-color: lightgrey"></div>

                            <div class="dropdown-item dropdown-item-style" href="#">
                                <div class="notification-image-wrapper">
                                    <div class="notification-image">
                                        <img src="#" class="rounded-circle" width="32">
                                    </div>
                                </div>

                                <div class="notification-text ng-binding">
                                    <span class="highlight" style="line-break: auto">Bill Gates</span><span class="more-info">heeft je bericht geliked.</span><br>
                                    <i class="fa fa-thumbs-o-up color-icons"></i> <small class="text-muted">5 Dagen geleden</small>
                                </div>
                            </div>

                            <div class="dropdown-divider m-0" style="border-color: lightgrey"></div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle navbar-profiletext" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="#" class="rounded-circle navbar-profileimage" style="">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-center z-depth-1" aria-labelledby="navbarDropdownMenuLink3" style="width: 250px; border-radius: 7px; padding-bottom: 0; top: 70px;">
                            <span class="triangle2"></span>
                            <div class="dropdown-item dropdown-title">
                                <div class="notification-image-wrapper">
                                    <div class="notification-image-profile">
                                        <img src="#" class="rounded-circle" width="42">
                                    </div>
                                </div>

                                <div class="notification-text ng-binding">
                                    <span class="highlight" style="line-break: auto">Rainier laan</span> <br>
                                    <small class="text-muted">Programmeur/Webdesigner</small>
                                </div>

                            </div>
                            <a class="dropdown-item dropdown-item-style2" href="{{ route('showProfile', Auth()->user()) }}"><i class="fa fa-user-o" aria-hidden="true"></i> Profiel</a>
                            <a class="dropdown-item dropdown-item-style2" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Berichten <span class="badge badge-dark float-right">5</span></a>
                            <a class="dropdown-item dropdown-item-style2" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Instellingen</a>
                            <a class="dropdown-item dropdown-item-style2" href="{{ route('adminpanel') }}"><i class="fa fa-th-large" aria-hidden="true"></i> Admin panel</a>
                            <a class="dropdown-item dropdown-item-style2" href="{{ route('logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i> Uitloggen</a>


                        </div>
                    </li>

                    @elseif(Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Aanmelden</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-hover nav-register-btn" href="{{ url('/register') }}">Registreren</a>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div id="app">
        @yield('content')


        <flash bericht="{{ session('flash') }}"></flash>
    </div>




    <script type="text/javascript" src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js') !!}" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/tinymce/tinymce.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/tinymce/jquery.tinymce.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/ict-hulp.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>


    </body>
</html>

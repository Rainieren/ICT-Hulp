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
    <body style="background-color: #F5F6F7">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-panel navbar-custom z-depth-1 border-none" style="background-color: #1b8bf9;">
        <div class="container-fluid" style="padding-left: 0;">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link" style="padding-left: 0;">Admin panel</a>
                    </li>
                </ul>

                <form class="form-inline" style="width: 70%; display: flex; justify-content: center;">
                    <input class="form-control search-input" type="search" placeholder="Zoeken..." name="search" id="search" style="width: 60%;">
                    <button class="btn btn-dark btn-hover" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-envelope-o" style="font-size: 20px; position: relative; top: 3px;"></i>
                        </a>
                    </li>

                    <li class="nav-item ml-3">
                        <a href="" class="nav-link">
                            <i class="fa fa-bell-o" style="font-size: 20px; position: relative; top: 3px;"></i>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="hidden-xs-only">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                            <span class="thumb-small avatar inline">
                                <img src="{{ Auth::user()->avatar() }}" class="rounded-circle" width="32" style="margin-left: 3px;">
                            </span>
                        </a>
                        <div class="dropdown-menu pull-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="background-color: #F5F6F7">
        <div class="row">
            <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar z-depth-3">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item mb-2 banner-background" >
                        <a href="" class="nav-link text-center" style="color: white; margin-top: 10px;">
                            <img src="{{ Auth::user()->avatar() }}" class="rounded-circle mb-2 " width="50" style="border: 2px solid white;"><br>
                            <p class="mb-0" style="font-weight: bold;" >{{ Auth::user()->username }}</p>
                            @if(Auth::user()->role_id == 2)
                            <span style="">Admin</span>
                            @elseif(Auth::user()->role_id == 3)
                            <span style="">Mod</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center {{ Route::currentRouteNamed('adminpanel') ? 'custom-active' : '' }}" href="{{ route('adminpanel') }}">
                            <i class="fa fa-dashboard fa-lg"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center {{ Route::currentRouteNamed('showBerichten') ? 'custom-active' : '' }}" href="{{ route('showBerichten') }}">
                            <i class="fa fa-desktop fa-lg"></i> <span>Berichten</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center {{ Route::currentRouteNamed('showGebruikers') ? 'custom-active' : '' }}" href="{{ route('showGebruikers') }}">
                            <i class="fa fa-users fa-lg"></i> <span>Gebruikers</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center {{ Route::currentRouteNamed('showReplies') ? 'custom-active' : '' }}" href="{{ route('showReplies') }}">
                            <i class="fa fa-comments fa-lg"></i> <span>Reacties</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center" href="">
                            <i class="fa fa-inbox fa-lg"></i><span>Inbox</span></a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center" href="">
                            <i class="fa fa-cog fa-lg"></i><span>Instellingen</span></a>
                    </li>
                    <li class="nav-item mb-3rem">
                        <a class="nav-link text-center" href="{{ route('home')  }}">
                            <i class="fa fa-mail-reply fa-lg"></i><span>Terug</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 col-lg-11 offset-lg-1 pt-3" style="margin-left: 125px; margin-top: 70px;">
                <div id="app">
                    @yield('content')

                    <flash bericht="{{ session('flash') }}"></flash>


                </div>
            </main>
        </div>
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

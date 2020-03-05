<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Testing</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{mix('css/ui.css')}}">
    <link rel="stylesheet" href="{{mix('css/sweetalert2.css')}}">
</head>
<body>
<div class="wrapper ">

    <!--data-color="black"-->
    <div class="sidebar" data-color="black">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->

        <div class="logo">
            {{--<a href="javascript:void(0);" class="simple-text logo-mini">
                null
            </a>--}}

            {{--            href="javascript:void(0);"--}}
            <span class="simple-text logo-normal">
                API Services
            </span>
        </div>

        <div class="sidebar-wrapper ps" id="sidebar-wrapper">
            <ul class="nav" id="opcionesSidebar">
                <li class="" id="liHome">
                    <a href="/home">

                        {{--                        <i class="now-ui-icons design_app"></i>--}}

                        <p>home</p>
                    </a>
                </li>

                <li id="liIcons">
                    <a href="/icons">

                        {{--                        <i class="now-ui-icons education_atom"></i>--}}

                        <p>Icons</p>
                    </a>
                </li>

                <li>
                    <a href="./map.html">

                        {{--                        <i class="now-ui-icons location_map-big"></i>--}}

                        <p>Maps</p>
                    </a>
                </li>

                <li>
                    <a href="./notifications.html">

                        {{--                        <i class="now-ui-icons ui-1_bell-53"></i>--}}

                        <p>Notifications</p>
                    </a>
                </li>

                <li>
                    <a href="./user.html">

                        {{--                        <i class="now-ui-icons users_single-02"></i>--}}

                        <p>User Profile</p>
                    </a>
                </li>
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">

                </div></div><div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">

                </div>
            </div>
        </div>
    </div>


    <div class="main-panel ps" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">

                    {{--<div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>--}}
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav" style="color: #0c2646">
                        {{--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="javascript:void(0);">Logout</a>
                            </div>
                        </li>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="row">
                <div class="ml-3" style="margin-top: 7vh;">
                    @yield('content')
                </div>
            </div>

        </div>
        {{--Content END--}}
    </div>
</div>


</body>
</html>

<script src="{{mix('js/app.js')}}"></script>
<script src="{{mix('js/ui.js')}}"></script>
<script src="{{mix('js/sweetalert2.js')}}"></script>
<script src="js/highlightButtons.js"></script>

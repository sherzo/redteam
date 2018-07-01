<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Style Menu Desplace  -->
    <link href="{{ asset('assets/css/menu/component.css') }}" rel="stylesheet">
    <!-- Semantic Ui CSS -->
    <link href="{{ asset('assets/css/semantic.css') }}" rel="stylesheet">
    <!-- STYLE FONT AWESOME -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Datepicker Files -->
    <link href="{{ asset('assets/css/datePicker/bootstrap-datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <!-- Main style -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main_responsive.css') }}" rel="stylesheet">
    
    @yield('css')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript" ></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="bgUser" onclick="quitNotifications()">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top navbarHome BgYellow" >
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse collapseMenuUser" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <img class="paleytaIco" src="{{ asset('assets/images/ico-paleta.png') }}" alt="Paleta-Colores">
                <div class="col-xs-12 col-sm-12 col-md-12 captionSelectColorPlat nonnePapletaUser">
                    <input type="hidden" class="userLogiColo" name="id_userLo" value="{{ Auth::user()->id }}">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div data-color="#d9e021" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors greensuaveBlock">

                        </div>
                        <div data-color="#b2b2b2" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors grisBlock">

                        </div>
                        <div data-color="#ffcd00" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors yelowBlock">

                        </div>
                        <div data-color="#ff8a00" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors orangeBlock">

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div data-color="#e54e53" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors rojosuaveBlock">

                        </div>
                        <div data-color="#1abc9c" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors verdeAcuaBlock">

                        </div>
                        <div data-color="#1abac8" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors celesteBlock">

                        </div>
                        <div data-color="#1a1a1a" class="col-xs-12 col-sm-3 col-md-3 bloqCOlors blackBlock">

                        </div>
                    </div>
                </div>
                <ul id="gn-menuData" class="nav navbar-nav gn-menu-main">
                    <li class="gn-trigger">
                        <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                        <nav class="gn-menu-wrapper">
                            <div class="gn-scroller">
                                <ul class="gn-menu">
                                    <li class="gn-search-item">
                                        <a href="{{ url('profile/' . Auth::user()->username ) }}">
                                            <p class="gasper"></p>
                                            <div class="containerPhotoProfile profileLateraS" style="background-image: url('{{ Auth::user()->avatar }}')">
                                            </div>
                                        </a>
                                        <p class="colorBlack fontMiriamProSemiBold">{{ Auth::user()->full_name }}</p>
                                    </li>
                                    <li class="bloquesMarca marEntrada" v-if="isWorking == null">
                                        <a class="BgYellow fontMiriamProSemiBold colorBlackSuave" @click.prevent="markEntry">Marcar entrada</a>
                                        <div class='secEntrada'>
                                        </div>
                                    </li>
                                    <li class="bloquesMarca marSalida" v-else-if="isWorking">
                                        <a class="BgYellow fontMiriamProSemiBold colorBlackSuave" @click.prevent="markExit">Marcar salida</a>
                                        <div class='secEntrada'>
                                        </div>
                                    </li>
                                     <li class="bloquesMarca marSalida" v-else>
                                        <p class="text-muted text-center "><small>Ha terminado su jornada</small></p>
                                    </li>
                                    <li class="bloquesMarca accionesPerfil">
                                        @auth
                                        <a href="{{ url('profile', Auth::user()->username) }}" class="fontMiriamProRegular colorGrisMediumSuave lineJustify">Editar perfil</a>
                                        @endauth
                                    </li>
                                    <li class="bloquesMarca accionesPerfil">
                                        <a href="{{ url('chats') }}" class="fontMiriamProRegular colorGrisMediumSuave lineJustify">Mensajes privados</a>
                                    </li>
                                    <li class="bloquesMarca accionesPerfil">
                                        <a href="profile" class="fontMiriamProRegular colorGrisMediumSuave lineJustify borderLineGris">Ver galerias</a>
                                    </li>
                                    <li class="bloquesMarca accionesPerfil accionesBussines">
                                        <a href="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/pdf/Manual-de-empleado.pdf" target="_blank" class="fontMiriamProRegular colorGrisSuave lineJustify">Manual de empleado</a>
                                    </li>
                                    <li class="bloquesMarca accionesPerfil accionesBussines">
                                        <a class="fontMiriamProRegular colorGrisSuave lineJustify">Reglamento institucional</a>
                                    </li>
                                    <li class="bloquesMarca accionesPerfil accionesBussines">
                                        <a class="fontMiriamProRegular colorGrisSuave lineJustify">Ayuda</a>
                                    </li>
                                </ul>
                            </div><!-- /gn-scroller -->
                        </nav>
                    </li>
                </ul>
                <ul class="centerNameUserMenu">
                    <li class="bloquesMarca marEntrada blockMobileMen colorBlack fontMiriamProRegular">
                        <a class="BgYellow fontMiriamProSemiBold colorBlackSuave">Marcar entrada</a>
                        <div class='secEntrada'>
                            <input type="hidden" name="id_user_login" class="IdloginUser" value="{{ Auth::user()->id }}">
                        </div>
                    </li>
                    <li class="bloquesMarca marSalida blockMobileMen colorBlack fontMiriamProRegular">
                        <a class="BgYellow fontMiriamProSemiBold colorBlackSuave">Marcar salida</a>
                        <div class='secEntrada'>
                            <input type="hidden" name="id_user_login" class="IdloginUser" value="{{ Auth::user()->id }}">
                        </div>
                    </li>
                    <li class="bloquesMarca accionesPerfil blockMobileMen colorBlack fontMiriamProRegular">
                        <a href="profile" class="fontMiriamProRegular colorGrisMediumSuave lineJustify">Editar perfil</a>
                    </li>
                    <li class="bloquesMarca accionesPerfil blockMobileMen colorBlack fontMiriamProRegular">
                        <a href="{{ url('chats') }}" class="fontMiriamProRegular colorGrisMediumSuave lineJustify">Mensajes privados</a>
                    </li>
                    <li class="bloquesMarca accionesPerfil accionesBussines blockMobileMen colorBlack fontMiriamProRegular">
                        <a href="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/pdf/Manual-de-empleado.pdf" target="_blank" class="fontMiriamProRegular colorGrisSuave lineJustify">Manual de empleado</a>
                    </li>
                    <li class="bloquesMarca accionesPerfil accionesBussines blockMobileMen colorBlack fontMiriamProRegular">
                        <a class="fontMiriamProRegular colorGrisSuave lineJustify">Reglamento institucional</a>
                    </li>
                    <li class="bloquesMarca accionesPerfil accionesBussines blockMobileMen colorBlack fontMiriamProRegular">
                        <a class="fontMiriamProRegular colorGrisSuave lineJustify">Ayuda</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right navulRIght">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="icosMenus noneMobile">
                            <a href="{{ url('home') }}">
                                <img src="{{ asset('assets/images/house-ido.png') }}" class="img-responsive" alt="">
                            </a>
                        </li>
                        <div class="ui dropdown dropdownSemantic notifiICos fontMiriamProRegular noneMobile" :class="{'active visible': toggle }" id="notifications" v-cloak>
                            <a href="#!" @click.prevent.stop="showNotifications">
                                <img src="{{ asset('assets/images/notify-ico.png') }}" class="img-responsive" alt="">
                                <div class="notifiCount">
                                    <p class="gasper">0</p>
                                    <p>@{{ unRead }}</p>
                                    {{--@include('front-end.partials.fields-Totalnotificaciones')--}}
                                </div>
                            </a>
                            <div :class="clases" :style="{ 'display': display }">
                                @include('components.notifications')
                            </div>
                        </div>
                        <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular">
                            <a href="#" class="dropdown-toggle colorBlackSuave" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('profile/'. Auth::user()->username) }}">Perfil</a>
                                    <a href="{{ url('/logout') }}"
                                       onclick="disconnect(event)">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="col-md-12">
        @include('flash::message')
    </div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/menu/classie.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/menu/gnmenu.js') }}" type="text/javascript" ></script>

<script>
    //new gnMenu( document.getElementById( 'gn-menu' ) );
</script>

<!-- Semantic Ui CSS -->
<script src="{{ asset('assets/js/semantic.js') }}" type="text/javascript" ></script>
<script src="http://127.0.0.1:6800/socket.io/socket.io.js"></script>
<script>    
    var authId = '{{ Auth::id() }}'
    const socket = io.connect('http://127.0.0.1:6800',{
        'reconnection': true,
        'reconnectionDelay': 500,
        'reconnectionAttempts': 10
    })

    @auth
        socket.emit('conect-socket', { id: '{{ Auth::user()->id }}' })
    @endauth

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('.dropdownSemantic')
        .dropdown({
            transition: 'drop'
        });
    
    function disconnect(event) {
        event.preventDefault();
        if(socket != undefined) {
            socket.emit('desconectar', { id: '{{ Auth::user()->id }}'} )     
        }
        document.getElementById('logout-form').submit();
    }
</script>
<script>
    $('.button')
        .popup({
            inline: true
        });

    $('.rating')
        .rating({
            maxRating: 5,
            disable: false,
        });
    $('.rating')
        .rating('disable')
    ;

    $('.accordion')
        .accordion({
            selector: {
                trigger: '.title div .fa-angle-down'
            }
        })
    ;
    $('.max.example .ui.fluid.dropdown')
        .dropdown({
            maxSelections: 15
        })
    ;
    $('.dataClicDEsplace .accordion')
        .accordion({
            selector: {
                trigger: '.title .fa-angle-down'
            }
        })
    ;
    
    function quitNotifications() {
        if(notification.toggle) {
            notification.showNotifications()
        }
    }
</script>

<script src="{{ asset('assets/js/moment.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/datePicker/bootstrap-datepicker.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/src/assistance.js') }}"></script>
<script src="{{ asset('assets/js/src/notification.js') }}"></script>
{{--
    --}}
@yield('js')
</body>
</html>

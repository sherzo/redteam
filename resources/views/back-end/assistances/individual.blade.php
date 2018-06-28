@extends('layouts.admin')

@section('content')

    <!-- SECTION MENU INTERNO HOME 
    -->
    <section class="container-fluid containernavNotifis">
        <nav class="navbar navbar-default navbar-static-top navbarHome BgYellow BgHistiry">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> --}}
                </div>

                <div class="collapse navbar-collapse collapseMenuUser" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <img class="paletaAdminBoard" src="{{ asset('assets/images/ico-paleta.png') }}" alt="Paleta-Colores">
                    <ul class="centerNameUserMenu">
                        <li class="colorBlack fontMiriamProRegular">Historial de entrada y salidas</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right navulRIght">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="icosMenus">
                                <a href="#!">
                                    <img src="{{ asset('assets/images/avatar/homeNotifiAdmin.png') }}" class="img-responsive" alt="">
                                </a>
                            </li>
                            <div class="ui dropdown dropdownSemantic notifiICos fontMiriamProRegular">
                                <a href="#!">
                                    <img src="{{ asset('assets/images/avatar/campaniNotifiAdmin.png') }}" class="img-responsive" alt="">
                                    <div class="notifiCount">
                                        @include('back-end.partials.fields-history-notificaciones-cantidad')
                                    </div>
                                </a>
                                <div class="menu">
                                    @include('back-end.partials.fields-history-notificaciones-board')
                                </div>
                            </div>
                            <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular">
                                <a href="#" class="dropdown-toggle colorBlackSuave datUsesSa" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                            Logout
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
    </section>

    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa sectionPostDats">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 HistiResultUser">
            <h1>{{ $user->full_name }}</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 RegistroFechas">
                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 registerDays">
                    <h3>Registro de</h3>
                    <div class="datasEntradasSalidas">
                        <h4>Entrada</h4>
                        <h4>Salida</h4>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 carouselhistirys">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                        	@foreach($assistances as $key => $assistance)
	                            @if($key == 0)
	                            	<div class="item active">
	                            @endif
										<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 registerDays">
	                                    	<h3>{{ $assistance->date }}</h3>
                                    		<div class="datasEntradasSalidas">
	                                        	<h4>{{ $assistance->display_entry }}</h4>
	                                        	<h4>{{ $assistance->display_exit }}</h4>
                                    		</div>
	                                	</div>
	                                
	                            @if($key % 5 == 0 && $key != 0)
	                        		</div>
	                        		<div class="item">
	                            @endif
	                       @endforeach
	                              
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control controlsHistirys" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control controlsHistirys" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

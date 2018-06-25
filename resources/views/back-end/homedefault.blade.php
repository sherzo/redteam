@extends('layouts.Template-admin')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido">
                <h1>Hola!</h1>
                @include('back-end.partials.fields-name-admin-login')
                @include('back-end.partials.fields-search-usuarios')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <ul class="nav navbar-nav navbar-right navulRIght">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno">
            <ul>
                <li class="active"><a href="home">Home</a></li>
                <li><a href="board">Board</a></li>
                <li><a href="usuarios">Usuarios</a></li>
            </ul>
        </div>
    </section>


    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido">
                <p class="alert alert-success">EL recordatorio se creo con exito!</p>

                <!-- notificaciones -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesNotification">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 daatNotifis">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifis">
                            <form action="" class="formNotifisDetall">
                                <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular dropNOtifis">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Hoy <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#!" class='ayerActivi'>
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="HistoryNotify">
                                                Ver historial
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </form>

                            <div class="dropdown">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu dropDetallNotify" aria-labelledby="dLabel">
                                    <li>
                                        <a href="HistoryNotify/" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberNotifis">
                                <h1>2</h1>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifitext">
                            <h3>Notificaciones</h3>
                        </div>

                    </div>

                    <!-- llegadas tarde -->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 daatNotifis">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifis">
                            <form action="" class="formNotifisDetall">
                                <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular dropLLegadas">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Hoy <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#!" class="ayerAsistencia">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="history">
                                                Ver historial
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </form>

                            <div class="dropdown">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu dropDetallAsiste" aria-labelledby="dLabel">
                                    <li>
                                        <a href="" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberAsisten">
                                <h1>2</h1>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifitext">
                            <h3>Llegadas tarde</h3>
                        </div>
                    </div>

                    <!-- Emergencias -->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 daatNotifis">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifis">
                            <form action="" class="formNotifisDetall">
                                <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular dropEmergenci">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Hoy <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#!" class="ayerEmergenci">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="emergencias">
                                                Ver historial
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </form>

                            <div class="dropdown">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu dropDetallEmerge" aria-labelledby="dLabel">
                                    <li>
                                        <a href="" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberEmergenci">
                                <h1 class="emergenciRed">1</h1>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifitext">
                            <h3>Emergencias</h3>
                        </div>
                    </div>


                    <!-- Permisos -->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 daatNotifis">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifis">
                            <form action="" class="formNotifisDetall">
                                <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular dropPermiso">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Hoy <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="" class="ayerPermiso">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Ver historial
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </form>

                            <div class="dropdown">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu dropDetallPermiso" aria-labelledby="dLabel">
                                    <li>
                                        <a href="" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberPermiso">
                                <h1 class="permisosOrange">3</h1>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifitext">
                            <h3>Permisos</h3>
                        </div>
                    </div>
                </div>

                <!-- end section notificaciones -->

                <!-- section mensajes -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menssagesBloques">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allTextMensages">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 chexAllsMensages">
                            <div class="dropdown dwropOptionMensgae">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <form action="home_submit" method="get" accept-charset="utf-8" class="removeMensage">
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </li>
                                    <li>
                                        <form action="home_submit" method="get" accept-charset="utf-8" class="removeMensage">
                                            <input type="submit" value="Marca como leído">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <form action="home_submit" method="get" accept-charset="utf-8" class="formCheallmensage">
                                <input type="checkbox">
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 textAllsMensages">
                            <a href=""><span>15</span>   Mensajes nuevos</a><span><span>1</span>-5</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="selectMensage">
                                <input type="checkbox">
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="mensageOne">
                                <a href="">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                                        <p>29 de Diciembre de 2016 a las 7:30 p.m.</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser">
                                        <img class="img-responsive" src="{{ asset('assets/images/profile-user-circle.png') }}" alt="">
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                            <h3>Lisseth Rivas <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt=""></h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                            <p>Oportunidades de empleo, pagos, inicio de proyectos,   apertura de sucursales, días feriados, actividades internas, etc.</p>
                                        </div>

                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="selectMensage">
                                <input type="checkbox">
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="mensageOne">
                                <a href="#!" data-iduserchat="">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                                        <p>29 de Diciembre de 2016 a las 7:30 p.m.</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser">
                                        <img class="img-responsive" src="{{ asset('assets/assets/images/profile-user-circle.png') }}" alt="">
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                            <h3>Lisseth Rivas</h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                            <p>Hola necesito que...</p>
                                        </div>

                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="selectMensage">
                                <input type="checkbox">
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="mensageOne">
                                <a href="">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                                        <p>29 de Diciembre de 2016 a las 7:30 p.m.</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser">
                                        <img class="img-responsive" src="{{ asset('assets/assets/images/profile-user-circle.png') }}" alt="">
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                            <h3 class="vieCandidate">Lisseth Rivas </h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                            <p>Oportunidades de empleo, pagos, inicio de proyectos,   apertura de sucursales, días feriados, actividades internas, etc.</p>
                                        </div>

                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- emd section mensajes  -->


            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 calendarAdmin">
                <!-- CALENDAR -->

                <div class="captionCalendar">
                    <div class="dayMonth">
                        <p class="fontMiriamProSemiBold">Agenda</p>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData">
                            <p class="DayAgenda">TUESDAY</p>
                            <p class="DayNumberAgenda">10</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData fechType">
                            <p class="typEEvento">Este día </br> no hay eventos</p>

                        </div>
                    </div>
                    @include('back-end.partials.field-calendar-admin-lateral')
                </div>

                <!-- END CALENDAR -->

                <!-- SECTION ADD EVENT CALENDAR -->

                <div class="captionAddEvento captionAddEventoHome">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#profile" class="fontMiriamProRegular" aria-controls="profile" role="tab" data-toggle="tab">Agregar evento a calendario</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabconteAddComent">
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <form action="postCreateEvento" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <textarea cols="30" rows="10" name="evento_descript" placeholder="Escribe el evento" required></textarea>
                                <div id='sandbox-container'>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                            <input type="text" class="input-sm form-control" name="fecha_start_evento" required />
                                        </div>
                                    </div>
                                    <h4 class="colorGrisMediumSuave fontMiriamProRegular">Seleccionar fecha</h4>
                                    <input type="hidden" name="id_user_evento" value="">
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 captioNFehcFina">
                                        <input type="submit" class="form-control Submit" value='Aceptar'/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- END SECTION ADD EVENTO -->

                <!-- REXCORDATORIOS -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 caption Addrecordatorio">
                    <h2>¡Recordar!</h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionRecordatorios">
                        <p>Tienes entrevistas este dia!</p>
                        <form action="removeRecordatorio" method="post" class="formHEchoRecordar" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id_remove_recordatorio" value="">
                            <input type="submit" class="submitHecho" value="Hecho">
                        </form>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 AddRcordadotior">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#AddRcordatorio" class="fontMiriamProRegular" aria-controls="AddRcordatorio" role="tab" data-toggle="tab">Agregar recordatorio</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabconteAddComent">
                            <div role="tabpanel" class="tab-pane fade" id="AddRcordatorio">
                                <form action="postCreateRecordatorio" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <textarea name="descrip_recordatorio" id="" cols="30" rows="10" placeholder="Escribe el recordatorio" required=""></textarea>
                                    <input type="hidden" name="id_user_recordatorio" value="{{ Auth::user()->id }}">
                                    <div id='sandbox-container'>
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 captioNFehcFina">
                                            <input type="submit" class="form-control Submit"  value='Aceptar'/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionPublichIcos">
                    <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
                </div>
                <!-- END RECORDATORIOS -->

            </div>
        </div>
    </section>


    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')

@endsection

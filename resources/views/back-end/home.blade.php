@extends('layouts.admin')

@section('css')
<style>
    .daysNumberCalendar>div {
        margin-left: 2px;
    }
    
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s;
    }
    
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
    
</style>
@endsection

@section('content')        
    
    @include('components.header-admin', [
        'title' => 'Hola!',
        'placeholder' => 'Buscar usuarios por su nombre'
    ])

    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno">
            <ul>
                <li class="active"><a href="{{ url('admin/home') }}">Home</a></li>
                <li><a href="{{ url('admin/board') }}">Board</a></li>
                <li><a href="{{ url('admin/users') }}">Usuarios</a></li>
            </ul>
        </div>
    </section>

    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido" id="home">
                <div v-cloak>
                <p class="alert alert-success" v-show="success != ''" >@{{ success }}</p>
                    
                </div>

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
                                            <a href="#!" class="ayerActivi" @click.prevent="getYesterday('notifications')">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/notifications') }}">
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
                                    {{--<li>
                                        <a href="#" data-daynext="">Detalles</a>
                                    </li>--}}
                                    <div class="menu" style="width: 300px;">
                                        @include('components.notifications')
                                    </div>
                                </ul>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberNotifis" v-cloak>
                                <h1>@{{ notifications }}</h1>
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
                                            <a href="#!" class="ayerAsistencia" @click.prevent="getYesterday('lates')">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/assistances') }}">
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
                                        <a href="{{ url('admin/assistances') }}" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberAsisten" v-cloak>
                                <h1>@{{ lates }}</h1>
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
                                            <a href="#!" class="ayerEmergenci" @click.prevent="getYesterday('emergencies')">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/emergencies') }}">
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
                                        <a href="{{ url('admin/emergencies') }}" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberEmergenci" v-cloak>
                                <h1 class="emergenciRed">@{{ emergencies }}</h1>
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
                                            <a href="" class="ayerPermiso" @click.prevent="getYesterday('applications')">
                                                Ayer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/applications') }}">
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
                                        <a href="{{ url('admin/applications') }}" data-daynext="">Detalles</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 countNumber counNumberPermiso" v-cloak>
                                <h1 class="permisosOrange">@{{ applications }}</h1>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 notifitext">
                            <h3>Permisos</h3>
                        </div>
                    </div>
                </div>

                <!-- end section notificaciones -->

                <!-- section mensajes -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menssagesBloques" v-cloak>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allTextMensages">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 chexAllsMensages">
                            <div class="dropdown dwropOptionMensgae" :class="{ dwropOptionMensgaeActive: isChecked }">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <form action="home_submit" @submit.prevent="deletes" method="get" accept-charset="utf-8" class="removeMensage">
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </li>
                                    <li>
                                        <form action="home_submit" @submit.prevent="markAsRead"  method="get" accept-charset="utf-8" class="removeMensage">
                                            <input type="submit" value="Marca como leído">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <form action="home_submit" method="get" accept-charset="utf-8" class="formCheallmensage">
                                <input type="checkbox" v-model="checkAll">
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 textAllsMensages">
                            <a href=""><span>@{{ messages.length }}</span>   Mensajes nuevos</a><span><span>1</span>-5</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="m in messages">
                        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                            <form action="home_submit" method="get" accept-charset="utf-8"  class="selectMensage">
                                <input type="checkbox" v-model="checkeds" :value="m.id">
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                            <form action="home_submit" method="get" accept-charset="utf-8" class="mensageOne">
                                <a href="">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                                        <p>@{{ m.created_at }}</p>
                                    </div>

                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser">
                                        <img class="img-responsive" :src="m.user.avatar" alt="">
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                            <h3>@{{ m.user.name }}<img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt=""></h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                            <p>@{{ m.content }}</p>
                                        </div>

                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-show="messages.length == 0">
                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                            <p class="text-muted"><em>Sin mensajes</em></p>
                        </div>
                    </div>
                        
                    <!--
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
                    </div> -->
                </div>
                <!-- emd section mensajes  -->


            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 calendarAdmin" id="calendar">
                <!-- CALENDAR -->

                <div class="captionCalendar" v-cloak>
                    <div class="dayMonth">
                        <p class="fontMiriamProSemiBold">Agenda</p>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData">
                            <p class="DayAgenda">{{ now()->format('l') }}</p>
                            <p class="DayNumberAgenda">{{ now()->format('d') }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData fechType">
                            <p class="typEEvento">Este día </br> no hay eventos</p>

                        </div>
                    </div>

                    @include('components.calendar')
                
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
                            <form action="postCreateEvento" method="post" @submit.prevent="addEvent">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <textarea cols="30" rows="10" name="evento_descript" placeholder="Escribe el evento" required v-model="title"></textarea>
                                <div id='sandbox-container'>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                            <input id="day" type="text" class="input-sm form-control" name="fecha_start_evento" required />
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 caption Addrecordatorio" id="reminders">
                    <h2>¡Recordar!</h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionRecordatorios" v-for="(r,i) in reminders">
                        <p>@{{ r.title }}</p>
                        <form action="removeRecordatorio" method="post" @submit.prevent="markAsCompleted(i)" class="formHEchoRecordar" accept-charset="utf-8">
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
                                <form action="postCreateRecordatorio" method="post" @submit.prevent="store">
                                    <textarea name="descrip_recordatorio" id="" cols="30" rows="10" placeholder="Escribe el recordatorio" required="" v-model="titler"></textarea>
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
    @include('components.modal-notifications')

@endsection


@section('js')
    <script src="{{ asset('assets/js/admin/colorpicker/spectrum.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('assets/js/src/calendar.js') }}"></script>
    <script src="{{ asset('assets/js/src/admin_notification.js') }}"></script>
    <script src="{{ asset('assets/js/src/admin_home.js') }}"></script>
@endsection
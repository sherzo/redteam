@extends('layouts.public')

@section('content')
    <div class="container continerWithSite" >
        <div class="row">
            <div class="col-xs-12 hidden-xs col-sm-6 col-md-3 col-lg-3  captionPosteos captionProfiles">

            <!-- CAPTION USER LIVES -->
            @include('components.users-online')

            <!-- SOLICITUD EN PROCESO -->
            @include('front-end.partials.fields-solicitud-proceso')

            <!-- HORARRIOS DE USURIOS -->
            @include('front-end.partials.fields-horarios')

            <!-- BUZON DE SUGERENCIAS , EMERGENCIAS Y SOLICITUDES -->
            @include('front-end.partials.fields-accione-permisos-sugerencias-andmore')

            <!-- Dias disponibles -->
            @include('front-end.partials.fields-day-vacaciones-users')

            <!-- Manuales -->
                @include('front-end.partials.fields-manuales')


            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles sectionPermissionRequest" v-cloak id="applications">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 remenber">
                    <h3>¡Recuerda que necesitas solicitar tu permiso 5 días antes!</h3>
                </div>
                <!-- MENSAJE SOLICTUD ENVIADA -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 SendSolicitud" v-show="success">
                    <h1>¡Solicitud enviada con exito!</h1>
                    <h4>Pronto se te notificará tu respuesta</h4>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 permission">
                    <h3>Motivo de permiso</h3>
                    <form class="formMotivoPermission" action="solicitud-permiso-send" method="post" accept-charset="utf-8" @submit.prevent="addApplication">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <textarea name="" placeholder="Describe el permiso" required="" v-model="reason"></textarea>
                        <p class="alert alert-danger" v-show="error">@{{ message }}</p>
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 blockSelectPermission">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4 calendarPermission">
                                <h1>Seleccionar fecha</h1>
                                <div class="calendarCite" style="overflow:hidden;">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="datetimepicker12"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 SelecHourPermission">
                                <h1>Selecciona  hora</h1>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 selecDatTime dayCompletoSelec" 
                                @click="complete = true">
                                    <a href="#!" >
                                        <p>Día completo</p>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 selecDatTime dayMedioSelec" 
                                @click="complete = false">
                                    <a href="#!">
                                        <p>Medio día</p>
                                    </a>
                                </div>
                            </div>
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-4 SelecDescuentPermission">
                                <h1>Selecciona el descuento</h1>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 selecDatTime SelecVacations" @click="discount = true">
                                    <a href="#!">
                                        <p>Vacaciones</p>
                                    </a>
                                    <input type="hidden">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 selecDatTime selectDIaSeven" @click="discount = false">
                                    <a href="#!">
                                        <p>Día y Septimo</p>
                                    </a>
                                    <input type="hidden">
                                </div>
                            </div>

                            <input type="hidden" name="tiempo_permiso" class="TimePermiso">
                            <input type="hidden" name="type_descuento" class="TipeDescuento">
                            <input type="hidden" name="id_tipo_solicitud" value="1">
                            <input type="hidden" name="fecha_permiso" class="DtaPermiso" >

                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 SubmitSolicituPermission">
                                <input type="submit" value="Enviar solicitud" class="submitPermi">
                            </div>
                        </div>
                    </form>
                </div>

               
            </div>

            <div class="col-xs-12 col-sm-6 hidden-xs hidden-sm col-lg-3 col-md-3 captionRecordNotas SecCalendar" >

                <!-- BLOQUE CALENDAR -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                    <!-- SECTION CALENDAR AND ADD EVENT CALENDAR -->
                     <div class="captionCalendar" v-cloak id="calendar">
                        <div class="dayMonth">
                            <p class="fontMiriamProSemiBold">Agenda</p>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData">
                                <p class="DayAgenda">Jueves</p>
                                <p class="DayNumberAgenda">{{ now()->format('d') }}</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData fechType">
                                <p class="typEEvento">
                                   
                                </p>
                            </div>
                        </div>
                    @include('components.calendar')
                        <div class="captionAddEvento">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="#profile" class="fontMiriamProRegular" aria-controls="profile" role="tab" data-toggle="tab">Agregar evento a calendario</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabconteAddComent">
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <form action="" @submit.prevent="addEvent">
                                        <textarea name="" id="" cols="30" rows="10" placeholder="Escribe el evento" v-model="title"></textarea>
                                        <div id='sandbox-container'>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                                    <input type="text" class="input-sm form-control" name="fecha-start" id="day"/>
                                                </div>
                                            </div>
                                            <h4 class="colorGrisMediumSuave fontMiriamProRegular">Seleccionar fecha</h4>
                                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 captioNFehcFina">
                                                <input type="submit" class="form-control Submit" name="end"  value='Aceptar'/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>


                <!-- GALERIA DE FOTOS -->
                    @include('components.galeries')
                </div>
            </div>
        </div>

        <div class="col-md-12 datPublich">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/IcoPublich.png') }}" alt="" data-toggle="modal" data-target="#myModal">
        </div>

    </div>

    <!-- Modal -->
    @include('front-end.partials.field-public-post')
    </div>

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

    <!-- Mensajes entrada salida -->
    @include('front-end.partials.fields-entrada-salida-mensajes')

    @include('front-end.partials.fields-windows-chat')

@endsection

@section('js')
<script src="{{ asset('assets/js/src/application.js') }}"></script>
<script src="{{ asset('assets/js/src/calendar.js') }}"></script>
<script src="{{ asset('assets/js/src/online.js') }}"></script>
<script src="{{ asset('assets/js/src/galery.js') }}"></script>
<script>
    galery.getGaleries(authId)
</script>
@endsection
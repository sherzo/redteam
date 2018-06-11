@extends('layouts.public')

@section('content')
    <div class="container continerWithSite" id="applications">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 captionPosteos captionProfiles">

                <!-- CAPTION USER LIVES -->
            @include('front-end.partials.fields-users-all-chat')

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

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles sectionPermissionRequest" v-cloak>
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

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 captionRecordNotas SecCalendar">

                <!-- BLOQUE CALENDAR -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- SECTION CALENDAR AND ADD EVENT CALENDAR -->
                @include('front-end.partials.fields-lateral-calendar')

                <!-- GALERIA DE FOTOS -->
                    @include('front-end.partials.fields-galeria-fotos-user')
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
@endsection
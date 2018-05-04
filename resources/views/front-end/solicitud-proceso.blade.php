@extends('layouts.Template-home')

@section('content')
    <div class="container continerWithSite">
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

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles sectionPermissionRequest">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 remenber">
                    <h3>¡Detalles de tu procesos de solicitudes!</h3>
                </div>
                <p class="alert alert-success">Tu comentario fue publicado con exito</p>

                {{-- SOLICITUDES DE PERMISOS --}}
                @include('front-end.partials.fields-ticket-solicitud-permiso')

                {{-- SOLICITUDES DE EMERGENCIAS --}}
                @include('front-end.partials.fields-ticket-solicitud-emergencias')

                {{-- SOLICITUDES DE SUGERENCIAS --}}
                @include('front-end.partials.fields-ticket-solicitud-sugerencias')
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

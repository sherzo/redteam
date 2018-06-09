@extends('layouts.public')

@section('content')
    <div class="container continerWithSite" id="suggestions">
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 motioEmergency">
                    <h3>Estamos abiertos a escucharte</h3>
                    <h5>Cuéntanos tu opinión</h5>
                    <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                        <form  class="sectionPublichUser SugerenciaSolicitud"
                             accept-charset="utf-8" enctype="multipart/form-data" @submit.prevent="addSugerency">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <textarea name="motivo_sugerencia" placeholder="Escribe un comentario" v-model="sugerency"></textarea>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions actionINEmergency">
                            {{--

                                <div class="contenMoreDocuments">
                                    <input type="file" class="fileInputEmergenci" name="file_inputemergencia_document[]" />
                                </div>
                                <div class="contenMoreDocuments">
                                    <input type="file" class="fileInputEmergenci2" name="file_inputemergencia_document[]" />
                                </div>
                                <div class="contenMoreDocuments">
                                    <input type="file" class="fileInputEmergenciImg" name="file_inputemergenci_imga[]" />
                                </div>
                                <div class="contenMoreDocuments">
                                    <input type="file" class="fileInputEmergenciImg2" name="file_inputemergenci_imga[]" />
                                </div>
                                --}}
                                <div class="col-md-6 actionpuBlish">
                                </div>
                                <div class="col-md-6 ButtinPublish">
                                    <input type="submit" value="Enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- MENSAJE SOLICTUD ENVIADA -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 SendSolicitud" v-show="success">
                    <h1>Fue enviado con exito</h1>
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
        @include('components.publication')
        <!-- Modal -->

    </div>

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

    <!-- Mensajes entrada salida -->
    @include('front-end.partials.fields-entrada-salida-mensajes')

    @include('front-end.partials.fields-windows-chat')

@endsection

@section('js')
<script src="{{ asset('assets/js/src/sugerency.js') }}"></script>
@endsection
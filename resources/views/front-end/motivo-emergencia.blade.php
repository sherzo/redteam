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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 motioEmergency">
                    <h3>Motivo de emergencia</h3>
                    <h5>Detalle cúal fue la emergencia (hora, día)</h5>
                    <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                        <form action="emergencia-send" method="post" class="sectionPublichUser emergenciSOlicitud" accept-charset="utf-8" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <textarea name="motivo_emergencia" placeholder="Escribe un comentario"></textarea>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions actionINEmergency">
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
                                <div class="col-md-6 actionpuBlish">
                                    <div class="col-md-2 Adjuntar adjunEmerImg">
                                        <img class="img-responsive img1DoEmer" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt=""onclick="document.getElementById('fileInput').click()">
                                        <input type="file" id="fileInput" ref="myFile" style="display: none" @change="getEmergencyFile">
                                    </div>
                                    <div class="col-md-2 AdjuntarFoto AdjuntarFotoEmergency">
                                        <img class="img-responsive img1FotEmer" onclick="chooseFileIMGEmer()" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="" onclick="document.getElementById('imageInput').click()">
                                    </div>
                                    <p>Adjuntar foto o documentos que respalden tu imprevisto</p>
                                </div>
                                <div class="col-md-6 ButtinPublish">
                                    <input type="submit" value="Enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- MENSAJE SOLICTUD ENVIADA -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 SendSolicitud">
                    <h1>Fue enviado con exito</h1>
                    <h4>Recuerda notifcar tu llegada a recursos humanos</h4>
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

@extends('layouts.Template-home')

@section('content')
    <div class="container continerWithSite containBloquePro">
        <div class="row">
            <p class="alert alert-success">El perfil se ha actualizado</p>
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

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts">
                    <div class="containerPhotoProfile" style="background-image: url('{{ asset('assets/images/profile-user-circle.png') }}')">
                    </div>
                    <p class="colorBlack fontMiriamProSemiBold">Lisset Rivas</p>
                    <div class="ui star rating" data-rating="5"></div>
                </div>
                <!-- Information empleado -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 InformacionEmpleado">
                    <form action="profile_submit" method="get" class="profile_userEdit" accept-charset="utf-8">
                        <input type="hidden" name="id_user_update" value="{{ Auth::user()->id }}">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEmpleados">

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Departamento</p>
                                    <input class="detallInformation dtaYesEdit" name="update_departament" type="text" value="San Salvador" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Cargo</p>
                                    <input class="detallInformation" type="text" value="Gerente" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Jefe inmediato</p>
                                    <input class="detallInformation" type="text" name="" value="Rodolfo Gutierrez" disabled="disabled">

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">ADP</p>
                                    <input class="detallInformation" type="text" value="Ninguno" disabled="disabled">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Género</p>
                                    <input class="detallInformation dtaYesEdit" name="update_genero" type="text" value="Femenino" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Estado Civil</p>
                                    <input class="detallInformation dtaYesEdit" name="update_estado_civil" type="text" value="Soltera" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Dirección</p>
                                    <input class="detallInformation dtaYesEdit" name="update_direccion" type="text" value="Residencial juaquin" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Correo</p>
                                    <input class="detallInformation" type="text" value="lise@example.com" disabled="disabled">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Cumpleaños</p>
                                    <input class="detallInformation dtaYesEdit" name="update_cumple" type="text" value="7 febrero" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Número de celular</p>
                                    <input class="detallInformation dtaYesEdit" name="update_cel" type="text" value="7846521892" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Extención</p>
                                    <input class="detallInformation dtaYesEdit" name="update_ext" type="text" value="15" disabled="disabled">
                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEmpleados TwoSection">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Técnico</p>
                                    <input class="detallInformation dtaYesEdit" name="update_tecnico" type="text" value="No" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Posgrado</p>
                                    <input class="detallInformation dtaYesEdit" name="update_posgrado" type="text" value="Ninguno" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Diplomado</p>
                                    <input class="detallInformation dtaYesEdit" name="update_diplomado" type="text" value="En Marketing y Ventas" disabled="disabled">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Habilidades</p>
                                    <input class="detallInformation dtaYesEdit" name="update_hibilidades" type="text" value="Google Adwords" disabled="disabled">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Otros conocimientos</p>
                                    <input class="detallInformation dtaYesEdit" name="update_other_conocimientos" type="text" value="back office" disabled="disabled">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataEditar dataeditarProfile">
                                <a href="#!" class="activeEditar">
                                    <p>Editar</p>
                                </a>
                                <a href="#!" class="dataSaveChanges">
                                    <p>Guardar</p>
                                </a>
                            </div>

                        </div>
                    </form>

                </div>




                <!-- EVENTOS COMPARTIDOS -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEventos">
                    <h3>Eventos compartidos</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos captionPostesOfUser">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="col-md-12">
                            <div class="ui feed uifeedAvatar">
                                <div class="event">
                                    <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                Leonardo
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave">
                                                1 Hour
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="textCOment fontMiriamProRegular colorGrisMediumSuave">Awww que bonito loremp imsum loremp imsum loremp imsum loremp imsum</p>
                            <div class="ui feed uifeedActions">
                                <div class="event">
                                    <div class="label">
                                        <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                    </div>
                                    <div class="content contLike">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                45 Likes
                                            </a>
                                            <div class="date datePint fontMiriamProRegular colorGrisMediumSuave">
                                                <img class="img-responsive" src="{{ asset('assets/images/pines-ico.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui feed uifeedComnetUser">
                                <div class="event">
                                    <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                Leonardo
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                Awww que bonito
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="ui form formComentUser">
                                <div class="field">
                                    <textarea name="comentario_post"  placeholder="Comentario" required></textarea>
                                    <input type="hidden" class="iduserComent" name="coment_action_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" class="idDataPost" name="data_id_post" value="">
                                </div>
                                <a href="" class="dataComenyt"><p>Comentar</p></a>
                            </form>
                        </div>
                    </div>

                    <!-- BLOQUE LATERAL  -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="col-md-12">
                            <div class="ui feed uifeedAvatar">
                                <div class="event">
                                    <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                Leonardo
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave">
                                                1 Hour
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="textCOment fontMiriamProRegular colorGrisMediumSuave">Awww que bonito loremp imsum loremp imsum loremp imsum loremp imsum</p>
                            <div class="ui feed uifeedActions">
                                <div class="event">
                                    <div class="label">
                                        <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                    </div>
                                    <div class="content contLike">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                45 Likes
                                            </a>
                                            <div class="date datePint fontMiriamProRegular colorGrisMediumSuave">
                                                <img class="img-responsive" src="{{ asset('assets/images/pines-ico.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui feed uifeedComnetUser">
                                <div class="event">
                                    <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                Leonardo
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                Awww que bonito
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="ui form formComentUser">
                                <div class="field">
                                    <textarea name="comentario_post"  placeholder="Comentario" required></textarea>
                                    <input type="hidden" class="iduserComent" name="coment_action_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" class="idDataPost" name="data_id_post" value="">
                                </div>
                                <a href="" class="dataComenyt"><p>Comentar</p></a>
                            </form>
                        </div>
                    </div>
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

    @include('front-end.partials.field-public-post')
    </div>

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
    <!-- Mensajes entrada salida -->
    @include('front-end.partials.fields-entrada-salida-mensajes')

    @include('front-end.partials.fields-windows-chat')

@endsection

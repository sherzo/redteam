@extends('layouts.public')

@section('css')
<style>
    .daysNumberCalendar>div {
        margin-left: 2px;
    }
</style>
@endsection

@section('content')
    <div class="container continerWithSite containBloquePro">
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
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles">
            {{ Form::open(['route' => 'profile.update', 'id' => 'formprofile', 'files' => true]) }}

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts">
                    <div class="containerPhotoProfile" style="background-image: url()">
                        <img src="{{ $user->avatar }}" alt="" class="containerPhotoProfile" id="imgPhoto" onclick="activateInput()">
                        <input type="file" style="display: none;" onchange="readURL(this)" id="inputPhoto" name="avatar" disabled="" class="dtaYesEdit">
                    </div>
                    <p class="colorBlack fontMiriamProSemiBold">{{ $user->full_name }}</p>
                    <div class="ui star rating" data-rating="{{ $user->stars }}">
                    </div>
                </div>
                <!-- Information empleado -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 InformacionEmpleado">
                    <form action="profile_submit" method="get" class="profile_userEdit" accept-charset="utf-8">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEmpleados">

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Departamento</p>
                                    <select name="area_id" class="detallInformation dtaYesEdit" disabled="">
                                        @foreach($areas as $key => $area)
                                            <option value="{{ $key }}" {{ $user->work->area_id == $key ? 'selected' : '' }}>{{ $area }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Cargo</p>
                                    <input class="detallInformation" type="text" value="{{ $user->work->position }}" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Jefe inmediato</p>
                                    <input class="detallInformation" type="text" name="" value="{{ $user->boss_name }}" disabled="disabled">

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">ADP</p>
                                    <input class="detallInformation" type="text" value="Ninguno" disabled="disabled">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Género</p>
                                    <select name="gender" disabled="" class="detallInformation dtaYesEdit">
                                        <option value="1" {{ $user->gender == 1 ? 'selected' : '' }} >Masculino</option>
                                        <option value="0"  {{ $user->gender == 0 ? 'selected' : '' }} >Femenino</option>
                                    </select>
                                    {{--
                                    <input class="detallInformation dtaYesEdit" name="gender" type="text" value="{{ $user->show_gender }}" disabled="disabled">
                                        --}}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Estado Civil</p>
                                    <select name="marital" class="detallInformation dtaYesEdit" disabled="">
                                    <option value="0" {{ $user->personal->marital == 0 ? 'selected' : '' }}>Soltero/a</option>
                                    <option value="1" {{ $user->personal->marital == 1 ? 'selected' : '' }}>Casado/a</option>
                                    <option value="2" {{ $user->personal->marital == 2 ? 'selected' : '' }}>Divorciado/a</option>
                                    <option value="3" {{ $user->personal->marital == 3 ? 'selected' : '' }}>Viudo/a</option>
                                </select>
                                    {{--<input class="detallInformation dtaYesEdit" name="marital" type="text" value="{{ $user->show_marital }}" disabled="disabled">--}}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Dirección</p>
                                    <input class="detallInformation dtaYesEdit" name="address" type="text" value="{{ $user->personal->address }}" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Correo</p>
                                    <input class="detallInformation dtaYesEdit" name="personal_email" type="email" value="{{ $user->personal->personal_email }}" disabled="disabled">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Cumpleaños</p>
                                    <input class="detallInformation dtaYesEdit" name="birthdate" type="date" value="{{ $user->personal->birthdate }}" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Número de celular</p>
                                    <input class="detallInformation dtaYesEdit" name="phone" type="text" value="{{ $user->work->phone }}" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Extención</p>
                                    <input class="detallInformation dtaYesEdit" name="extension" type="text" value="{{ $user->work->extension }}" disabled="disabled">
                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEmpleados TwoSection">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Técnico</p>
                                    <input class="detallInformation dtaYesEdit" name="technical" type="text" value="{{ $user->academic->technical }}" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Posgrado</p>
                                    <input class="detallInformation dtaYesEdit" name="postgraduate" type="text" value="{{ $user->academic->postgraduate }}" disabled="disabled">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Diplomado</p>
                                    <input class="detallInformation dtaYesEdit" name="diplomat" type="text" value="{{ $user->academic->diplomat }}" disabled="disabled">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Habilidades</p>
                                    <input class="detallInformation dtaYesEdit" name="abilities" type="text" value="{{ $user->academic->abilities }}" disabled="disabled">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ColumnsData">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ColumnsDataText">
                                    <p class="titleInformation">Otros conocimientos</p>
                                    <input class="detallInformation dtaYesEdit" name="others" type="text" value="{{ $user->academic->others }}" disabled="disabled">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataEditar dataeditarProfile">
                                @auth
                                    @if(Auth::user()->id == $user->id)
                                        <a href="#!" class="activeEditar">
                                            <p>Editar</p>
                                        </a>
                                    @endif
                                @endauth  

                                <a href="#" class="dataSaveChanges" >
                                    <p>Guardar</p>
                                </a>
                            </div>

                        </div>
                    </form>

                </div>

            {{ Form::close() }}


                <!-- EVENTOS COMPARTIDOS -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEventos">
                    <h3>Eventos compartidos</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos captionPostesOfUser">
                    {{--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
                    </div>--}}

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

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 captionRecordNotas SecCalendar" id="calendar">

                <!-- BLOQUE CALENDAR -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- SECTION CALENDAR AND ADD EVENT CALENDAR -->
                    <div class="captionCalendar">
                        <div class="dayMonth" >
                            <p class="fontMiriamProSemiBold">Agenda</p>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData">
                                <p class="DayAgenda">Agosto</p>
                                <p class="DayNumberAgenda">10</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData fechType">
                                <p class="typEEvento">Hoy Cumpleaños Karla</p>
                                <!-- <p class="typEEvento">Este día </br> no hay eventos</p>  -->

                            </div>
                        </div>
                        <div v-cloak>
                            @include('components.calendar')
                        </div>
                    </div>

                    <div class="captionAddEvento">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" ><a href="#profile" class="fontMiriamProRegular" aria-controls="profile" role="tab" data-toggle="tab" >Agregar evento a calendario</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabconteAddComent">
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <form action="postCreateEvento" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <textarea cols="30" rows="10" name="evento_descript" placeholder="Escribe el evento" required v-model="title"></textarea>
                                    <div id='sandbox-container'>
                                        <div class="input-daterange input-group" id="datepicker">
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                                <input type="text" class="input-sm form-control" id="day" name="fecha_start_evento" required />
                                            </div>
                                        </div>
                                        <h4 class="colorGrisMediumSuave fontMiriamProRegular">Seleccionar fecha</h4>
                                        <input type="hidden" name="id_user_evento" value="{{ Auth::user()->id }}">
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 captioNFehcFina">
                                            <input type="submit" class="form-control Submit" value='Aceptar'/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--

                    @include('front-end.partials.fields-lateral-calendar')
                        --}}

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

@section('js')
<script>
$(document).ready(function() {
    $('.dataeditarProfile').click(function(event) {
        $('.dtaYesEdit').prop( "disabled", false );
        $('.dtaYesEdit').toggleClass("profileEidtars");
        $('.dataSaveChanges').addClass('dataSaveChangesActive');
        $('.activeEditar').addClass('disabelBOtEdit');
    });

    $('.dataSaveChanges').click(function(e){
        e.preventDefault();
        $('#formprofile').submit();
    })
});
</script>
<script src="{{ asset('assets/js/src/upload-file.js') }}"></script>
<script src="{{ asset('assets/js/src/calendar.js') }}"></script>
@endsection

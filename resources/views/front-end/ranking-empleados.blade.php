@extends('layouts.Template-home')

@section('content')
    <div class="container continerWithSite containRTanks">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos captionRabkinEmpleados">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 profilesRabking">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts">
                        <div class="label dataPrubeIm dataProfileRankingUser" style="background-image: url('{{ asset('assets/profiles/prifle.png') }}')">
                        </div>
                        <a href="profile-users/1">
                            <p class="colorBlack fontMiriamProSemiBold">Francisca De Flores</p>
                        </a>

                        <p class="PuntuancionRanlinkNumber">4.5</p>
                        <div class="ui star rating" data-rating="5"></div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 profilesRabking profileMoreUSaer">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ProfileFotosStartsMoreUser">
                        <div class="label dataPrubeIm dataProfileRankingUser ranINDDS" style="background-image: url('{{ asset('assets/profiles/profile2.jpg') }}')">
                        </div>
                        <a href="profile-users/1">
                            <p class="colorBlack fontMiriamProSemiBold">Jessica Ramirez</p>
                        </a>
                        <div class="ui star rating" data-rating="4"></div>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 captionRecordNotas captionRanKingDats">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bloqueRecordatorios SuirRanking">
                    <h1>¿Cómo puedes </br> subir de ranking?</h1>
                    <ul>
                        <li>Debes procurar seguir el reglamento de Grupo Valdez, para mayor infomración lee el el Manual de empleado y politicas de la empresa</li>
                        <li>Ser proactivo y propósitivo en tu trabajo</li>
                    </ul>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 Manuales">
                        <a href="">
                            <p>Ver Manual de Empleado</p>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 Manuales PoliTi">
                        <a href="">
                            <p>Ver políticas de la empresa</p>
                        </a>
                    </div>
                    <h2>¡Los mejores empleados </br> recibiran excelentes regalos! </h2>
                </div>

                <!-- BLOQUE CALENDAR -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 listConection liconnectRankin">
                    <div class="col-xs-12 col-sm-12 col-md-12 backReturn">
                        <a href="home">
                            <p>Regresar a Board de trabajo</p>
                        </a>

                        <!-- ALL USERS  -->
                    @include('front-end.partials.fields-users-all-chat')


                    <!-- SOLICITUD DE PERMISO  -->
                        <div class="col-xs-12 col-sm-12 col-md-12 LinksForEmpleados ForEmpleadoRnakin">
                            <ul>
                                <li>
                                    <a href="{{ asset('assets/pdf/Manual-de-empleado.pdf') }}">
                                        Manual de empleado
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Reglamento institucional
                                    </a>
                                </li>
                                <li>
                                    <a href="#!">
                                        Ayuda
                                    </a>
                                </li>
                            </ul>
                        </div>


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
    {{-- Mensajes entrada salida --}}
    @include('front-end.partials.fields-entrada-salida-mensajes')

    {{-- WINDOWS CHAT --}}
    @include('front-end.partials.fields-windows-chat')
@endsection

@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/documents.css') }}">
@endsection
@section('content')
<div id="ranking">
    @include('components.header-admin', [
        'title' => 'Rankings',
        'placeholder' => 'Rankings de los usuarios'
    ])

    <!--  SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa secNotifiRanking" style="margin-top: 7vh;" v-cloak>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido conteniRanking">
                <p class="alert alert-success" v-show="adp_exito">Se ha colocado la ADP</p>
                <p class="alert alert-success" v-show="puntos_exito">Modificacion exitosa</p>
                <!-- rankings -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesRankins">
                    <!-- Bloque Subtitles sections -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsTitles">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h3>Todos los contactos (@{{count}})</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <h3>Ranking</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <h3>ADP</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                            <h3>Edición</h3>
                        </div>
                    </div>
                    <!-- END Bloque Subtitles sections -->

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueUserRankings" v-for="employee in employees">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" :style="{ 'background-image': 'url(' + employee.avatar + ')' }"></div>
                                    <p class="fontMiriamProSemiBold">@{{employee.name}} @{{employee.lastname}}</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating" :data-rating="employee.stars">
                                        <i class="icon" v-for="s in stars" :class="{ 'active': s <= employee.stars }"></i>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <h3>@{{employee.adp}}</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form>
                                            <select v-model="employee.select" :key="employee.id">
                                                <option value="" selected disabled>Colocar ADP</option>
                                                <option value="15">Ascenso</option>
                                                <option value="10">Aumento de Sueldo</option>
                                                <option value="8">Trabajo Extraordinario</option>
                                                <option value="5">Horas Extras</option>
                                                <option value="-10">Falsedad material</option>
                                                <option value="-10">Amonestación escrita</option>
                                                <option value="-15">Ausencia sin permiso</option>
                                            </select>
                                            <button type="button" class="btn btn-primary" @click="enviar(employee.id,employee.select,employee.index)" style="margin-left: 2vw;">Aceptar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end section rankings -->
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
                </div>
            </div>
    </section>

    <!-- Modal -->
    @include('front-end.partials.field-public-post')

    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')
    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/src/ranking.js') }}"></script>
@endsection
@extends('layouts.admin')

@section('content')

    @include('components.header-admin', [
        'title' => 'Historial de llegada',
        'placeholder' => 'Buscar por nombre de usuario'
    ])


    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa secNotifiRanking" id="history">
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido conteniRanking">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesRankins">
                    <!-- Bloque Subtitles sections -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsTitles">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h3>Todos los contatos (@{{ assistances.length }})</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h3>Hora de entrada</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h3>Hora de salida</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h3>Ranking</h3>
                        </div>
                    </div>
                    <!-- END Bloque Subtitles sections -->
                </div>

                <!-- end section rankings -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueUserRankings">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear" v-for="(a, i) in assistances">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" :style="{ 'background-image': 'url(' + a.user.avatar + ')' }">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">@{{ a.user.name }} @{{ a.user.lastname }}</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-20 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <p :class="{ 'llegadaTarde': !a.entry_status }">@{{ a.entry | showTime }}</p>
                                <p class="coloADP" v-if="!a.entry_status && !a.adp" data-toggle="modal" data-target="#colorADP" @click.prevent="modalADP(i, a.user, a.id)">Colocar ADP</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-20 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <h3 :class="{ 'horaSalidaAntes': !a.exit_status }">@{{ a.exit | showTime }}</h3>
                                <p class="coloADP" v-if="!a.exit_status && !a.adp" data-toggle="modal" data-target="#colorADP" @click.prevent="modalADP(i, a.user, a.id)">Colocar ADP</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating" :data-rating="a.user.stars">
                                    <i class="icon" v-for="s in stars" :class="{ 'active': s <= a.user.stars }"></i>
                                </div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="" @click.prevent="individual(a.user.id)">Ver historial</a>
                                            <a href="{{ url('admin/chat') }}">Enviar mensaje</a>
                                            <a href="" @click="showPhoto(a)" data-toggle="modal" data-target="#modalPhoto">Ver fotografía</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="colorADP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog contAcotionModlas" role="document">
                <div class="modal-content">
                    <div class="modal-body captionBodySolicRespuesa">
                        <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                            <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                <h5 class="aceptSol" v-if="!modal.complete">¿Esta seguro que desea colocar ADP a @{{ modal.name }}?</h5>
                                <h5 class="aceptSol" v-else>La acción de personal fue colocado exitosamente a:</h5>

                                <div class="captionEvulveImg" :style="{ 'background-image': 'url(' + modal.avatar + ')' }">
                                </div>
                                <h4 class="nameSoliUser">@{{ modal.name }}</h4>
                                <p class="AcepAdp" @click="addADP">Aceptar</p>
                                <p class="return" data-dismiss="modal" id="didmis">Regresar</p>
                                <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal photo -->
        <div class="modal fade" id="modalPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog dialoDataImgen" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img class="img-responsive" :src="photo" alt="" v-if="photo != ''">
                        <img class="img-responsive" src="{{ asset('assets/images/sin_photo.png') }}" alt="" v-else>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="col-md-12 datPublich publishChatAdmin publichDocuemnts">
        <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
        <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
    </div>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
   
@endsection

@section('js')
    <script src="{{ asset('assets/js/src/assistances_history.js') }}"></script>
@endsection
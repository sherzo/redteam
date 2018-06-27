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
                            <h3>Todos los contatos (50)</h3>
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear" v-for="a in assistances">
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
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-20 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <h3 :class="{ 'horaSalidaAntes': !a.exit_status }">@{{ a.exit | showTime }}</h3>
                                <p class="coloADP" v-if="!a.exit_status" data-toggle="modal" data-target="#colorADP" @click.prevent="addADP(a.user)">Colocar ADP</p>
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
                                            <a href="history/3">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Jessica Ramirez</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-30 00:00:00</p>
                                <p class="gasper">Thursday</p>
                                <p>07:58 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-30 00:00:00</p>
                                <p class="gasper">Thursday</p>
                                <h3 class="horaSalidaAntes">16:41 p.m</h3>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Jessica?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Jessica Ramirez</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="3" name="_id_usuario">
                                                            <input type="hidden" value="2" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/3">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-26 00:00:00</p>
                                <p class="gasper">Sunday</p>
                                <p>08:00 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-26 00:00:00</p>
                                <p class="gasper">Sunday</p>
                                <h3>16:51 p.m</h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-27 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <p>07:45 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-27 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <h3>16:51 p.m</h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:46 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="5" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:47 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta6">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="6" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:48 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta7">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="7" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:49 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta8">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="8" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:50 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta9">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="9" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:51 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>

                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta10">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="10" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>

                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:52 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta11">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="11" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:53 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta12">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="12" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <p>07:54 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-28 00:00:00</p>
                                <p class="gasper">Tuesday</p>
                                <h3 class="horaSalidaAntes">16:51 p.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta13">Colocar ADP</p>

                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="13" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-03-30 00:00:00</p>
                                <p class="gasper">Thursday</p>
                                <p>10:19 a.m</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-03-30 00:00:00</p>
                                <p class="gasper">Thursday</p>
                                <h3 class="horaSalidaAntes"> a.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta14">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="14" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                </div>

                                <p class="fontMiriamProSemiBold nameUSerHisroty">Janixia Palacios</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-04-13 00:00:00</p>
                                <p class="gasper">Thursday</p>
                                <p class="llegadaTarde">22:45 p.m</p>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta15">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Janixia?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Janixia Palacios</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="5" name="_id_usuario">
                                                            <input type="hidden" value="15" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-04-13 00:00:00</p>
                                <p class="gasper">Thursday</p>
                                <h3>22:45 p.m</h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/5">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Janixia Palacios</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-04-17 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <p class="llegadaTarde">16:16 p.m</p>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta17">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta17" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Janixia?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Janixia Palacios</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="5" name="_id_usuario">
                                                            <input type="hidden" value="17" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-04-17 00:00:00</p>
                                <p class="gasper">Monday</p>
                                <h3 class="horaSalidaAntes"> a.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta17">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta17" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Janixia?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Janixia Palacios</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="5" name="_id_usuario">
                                                            <input type="hidden" value="17" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/5">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                </div>

                                <p class="fontMiriamProSemiBold nameUSerHisroty">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-04-21 00:00:00</p>
                                <p class="gasper">Friday</p>
                                <p class="llegadaTarde">18:47 p.m</p>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta18">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta18" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Administrador?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Administrador --</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="2" name="_id_usuario">
                                                            <input type="hidden" value="18" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-04-21 00:00:00</p>
                                <p class="gasper">Friday</p>
                                <h3>18:48 p.m</h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/2">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings DataUserRankingsHistory dataHitorySear">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz searchHis">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                <div class="label dataPrubeIm dataProfileHistory" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                </div>
                                <p class="fontMiriamProSemiBold nameUSerHisroty">Janixia Palacios</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 horaEntrada">
                                <p class="gasper">2017-04-22 00:00:00</p>
                                <p class="gasper">Saturday</p>
                                <p class="llegadaTarde">12:37 p.m</p>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta19">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Janixia?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Janixia Palacios</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="5" name="_id_usuario">
                                                            <input type="hidden" value="19" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 CountADP horaSalida">
                                <p class="gasper">2017-04-22 00:00:00</p>
                                <p class="gasper">Saturday</p>
                                <h3 class="horaSalidaAntes"> a.m</h3>
                                <p class="coloADP" data-toggle="modal" data-target="#myModalSolicitudRespuesta19">Colocar ADP</p>
                                <!-- Modal -->
                                <div class="modal fade" id="myModalSolicitudRespuesta19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog contAcotionModlas" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body captionBodySolicRespuesa">
                                                <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                                                        <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a Janixia?</h5>
                                                        <div class="captionEvulveImg" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                                                        </div>
                                                        <h4 class="nameSoliUser">Janixia Palacios</h4>
                                                        <p class="AcepAdp">Aceptar</p>
                                                        <p class="return" data-dismiss="modal">Regresar</p>
                                                        <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                            <input type="hidden" value="7" name="type_adp">
                                                            <input type="hidden" value="5" name="_id_usuario">
                                                            <input type="hidden" value="19" name="_id_asistencia">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 starRankinHistiry">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                <div class="dropdown drowOptionHistriaul">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li class="selecEdit">
                                            <a href="history/5">Ver historial</a>
                                            <a href="chat">Enviar mensaje</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        --}}
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
                                <h5 class="aceptSol">¿Esta seguro que desea colocar ADP a @{{ modal.name }}?</h5>
                                <div class="captionEvulveImg" :style="{ 'background-image': 'url(' + modal.avatar + ')' }">
                                </div>
                                <h4 class="nameSoliUser">@{{ modal.name }}</h4>
                                <p class="AcepAdp">Aceptar</p>
                                <p class="return" data-dismiss="modal">Regresar</p>
                                <form action="adps" method="post" accept-charset="utf-8" class="placeADP">
                                </form>
                            </div>
                        </div>
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

    <!-- Modal -->
    <div class="modal fade" id="myModalSolicitudRespuestCorrect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog contAcotionModlas" role="document">
            <div class="modal-content">
                <div class="modal-body captionBodySolicRespuesa">
                    <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                        <div class="col-xs-12 col-sm-12 col-md-12 clAdpsCLo">
                            <h5 class="aceptSol">La acción de personal fue colocado exitosamente a:</h5>
                            <div class="captionEvulveImg" >
                            </div>
                            <h4 class="nameSoliUser">Lisseth Rivas</h4>
                            <p class="Aceptado" data-dismiss="modal">Aceptar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection

@section('js')
    <script src="{{ asset('assets/js/src/assistances_history.js') }}"></script>
    <script>

        //$('#myModalSolicitudRespuestCorrect').modal('show');
    </script>
@endsection
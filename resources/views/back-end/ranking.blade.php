@extends('layouts.Template-admin')

@section('content')
    <div class="container continerWithSite wirhSiteRankikng">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>Ranking</h1>
                @include('back-end.partials.fields-name-admin-login')

                <form action="home_submit" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formSearch formSearchRanking" method="get" accept-charset="utf-8">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input id="filtrar" type="text" placeholder="Buscar">
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <ul class="nav navbar-nav navbar-right navulRIght">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>



    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa secNotifiRanking">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido conteniRanking">
                <p class="alert alert-success">Se ha colocado la ADP</p>

                <!-- rankings -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesRankins">
                    <!-- Bloque Subtitles sections -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsTitles">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h3>Todos los contatos (50)</h3>
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

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueUserRankings">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')"></div>
                                    <p class="fontMiriamProSemiBold">Administrador --</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <p class="gasper">0</p>
                                    <p class="gasper">1</p>
                                    <h3>1</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form action="ranking_adp" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                            <input type="hidden" name="_id_usuario" value="2">
                                            <select name="id_adp">
                                                <option value="Colocar ADP">Colocar ADP</option>
                                                <option value="1">Ascenso</option>
                                                <option value="2">Aumento de Sueldo</option>
                                                <option value="3">Trabajo Extraordinario</option>
                                                <option value="4">Horas Extras</option>
                                                <option value="5">Falsedad material</option>
                                                <option value="6">Amonestación escrita</option>
                                                <option value="8">Ausencia sin permiso</option>
                                            </select>
                                            <input type="submit" value="Aceptar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')"></div>
                                    <p class="fontMiriamProSemiBold">Jessica Ramirez</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <p class="gasper">0</p>
                                    <p class="gasper">1</p>
                                    <h3>1</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form action="ranking_adp" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                            <input type="hidden" name="_id_usuario" value="3">
                                            <select name="id_adp">
                                                <option value="Colocar ADP">Colocar ADP</option>
                                                <option value="1">Ascenso</option>
                                                <option value="2">Aumento de Sueldo</option>
                                                <option value="3">Trabajo Extraordinario</option>
                                                <option value="4">Horas Extras</option>
                                                <option value="5">Falsedad material</option>
                                                <option value="6">Amonestación escrita</option>
                                                <option value="8">Ausencia sin permiso</option>
                                            </select>
                                            <input type="submit" value="Aceptar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/56810.png')"></div>
                                    <p class="fontMiriamProSemiBold">Francisca De Flores</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <p class="gasper">0</p>
                                    <h3>0</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form action="ranking_adp" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                            <input type="hidden" name="_id_usuario" value="4">
                                            <select name="id_adp">
                                                <option value="Colocar ADP">Colocar ADP</option>
                                                <option value="1">Ascenso</option>
                                                <option value="2">Aumento de Sueldo</option>
                                                <option value="3">Trabajo Extraordinario</option>
                                                <option value="4">Horas Extras</option>
                                                <option value="5">Falsedad material</option>
                                                <option value="6">Amonestación escrita</option>
                                                <option value="8">Ausencia sin permiso</option>
                                            </select>
                                            <input type="submit" value="Aceptar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')"></div>
                                    <p class="fontMiriamProSemiBold">Janixia Palacios</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <p class="gasper">0</p>
                                    <h3>0</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form action="ranking_adp" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                            <input type="hidden" name="_id_usuario" value="5">
                                            <select name="id_adp">
                                                <option value="Colocar ADP">Colocar ADP</option>
                                                <option value="1">Ascenso</option>
                                                <option value="2">Aumento de Sueldo</option>
                                                <option value="3">Trabajo Extraordinario</option>
                                                <option value="4">Horas Extras</option>
                                                <option value="5">Falsedad material</option>
                                                <option value="6">Amonestación escrita</option>
                                                <option value="8">Ausencia sin permiso</option>
                                            </select>
                                            <input type="submit" value="Aceptar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/49907.png')"></div>
                                    <p class="fontMiriamProSemiBold">Alicia Ortíz</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <p class="gasper">0</p>
                                    <p class="gasper">1</p>
                                    <p class="gasper">2</p>
                                    <p class="gasper">3</p>
                                    <h3>3</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form action="ranking_adp" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                            <input type="hidden" name="_id_usuario" value="6">
                                            <select name="id_adp">
                                                <option value="Colocar ADP">Colocar ADP</option>
                                                <option value="1">Ascenso</option>
                                                <option value="2">Aumento de Sueldo</option>
                                                <option value="3">Trabajo Extraordinario</option>
                                                <option value="4">Horas Extras</option>
                                                <option value="5">Falsedad material</option>
                                                <option value="6">Amonestación escrita</option>
                                                <option value="8">Ausencia sin permiso</option>
                                            </select>
                                            <input type="submit" value="Aceptar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataUserRankings AlluserRankinSearch">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueactionsRankingsSz ranlingSty">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 UserImgData">
                                    <div class="label dataPrubeIm dataProfileAllUsersRanking" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/67358.png')"></div>
                                    <p class="fontMiriamProSemiBold">Julio Durán</p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 starRankin">
                                    <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 CountADP">
                                    <p class="gasper">0</p>
                                    <h3>0</h3>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 editionAction">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 editerRabling">
                                        <form action="ranking_adp" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                            <input type="hidden" name="_id_usuario" value="7">
                                            <select name="id_adp">
                                                <option value="Colocar ADP">Colocar ADP</option>
                                                <option value="1">Ascenso</option>
                                                <option value="2">Aumento de Sueldo</option>
                                                <option value="3">Trabajo Extraordinario</option>
                                                <option value="4">Horas Extras</option>
                                                <option value="5">Falsedad material</option>
                                                <option value="6">Amonestación escrita</option>
                                                <option value="8">Ausencia sin permiso</option>
                                            </select>
                                            <input type="submit" value="Aceptar">
                                        </form>
                                    </div>
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

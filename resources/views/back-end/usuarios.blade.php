@extends('layouts.Template-admin')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>6 Usuarios</h1>
                @include('back-end.partials.fields-name-admin-login')

                <form action="home_submit" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formSearch" method="get" accept-charset="utf-8">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input id="filtrarUser" type="text" placeholder="Buscar usuario">
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

    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno">
            <ul class="listActionDocuemntps">
                <li ><a href="home">Home</a></li>
                <li><a href="board">Board</a></li>
                <li class="active"><a href="usuarios">Usuarios</a></li>
                <li class="dreopDocument">
                    <div class="dropdown dwropOptionMensgae">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li class="selecEdit">
                                <a href="#!">Seleccionar y editar</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="GetGroup">
                    <form action="usuarios/grupos/edit" method="post" accept-charset="utf-8" class="formSelectGropu">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" value="Editar usuarios seleccionados">
                    </form>
                </li>
            </ul>
        </div>
    </section>


    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido centerContentAllUSer">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueUsersAll">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUserTitles">
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                            <p>Todos los contatos <span>(50)</span> </p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <p>Correo</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                            <p>Celular</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                            <p>Ext.</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <p>Ranking</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                            <p>ADP</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                            <p>Nota</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                                <div class="dropdown DropOptinUsersD optionAllUsers open">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button><div class="dropdown-backdrop"></div>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <a href="usuarios/edit/2">Editar información</a>
                                        </li>
                                        <li>
                                            <a href="usuarios/editHorario/2">Editar horario</a>
                                        </li>
                                        <li>
                                            <form action="Desactive_Users" method="post" accept-charset="utf-8" class="removeUsers">
                                                <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                <input type="hidden" name="ide_user" value="2">
                                                <input type="submit" value="Eliminar">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <input type="checkbox" class="datSelectEdit" value="2">
                                <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ asset('assets/profiles/73049.jpg') }}')"></div>
                                <p class="fontMiriamProSemiBold">Administrador --</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                                <p>administrador@admin.com</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                                <p>78797888</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                                <p>12</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                                <p class="gasper">0</p>
                                <p class="gasper">1</p>
                                <p>1</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                                <p class="gasper"> 0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                                <div class="dropdown DropOptinUsersD optionAllUsers">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <a href="usuarios/edit/3">Editar información</a>
                                        </li>
                                        <li>
                                            <a href="usuarios/editHorario/3">Editar horario</a>
                                        </li>
                                        <li>
                                            <form action="Desactive_Users" method="post" accept-charset="utf-8" class="removeUsers">
                                                <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                <input type="hidden" name="ide_user" value="3">
                                                <input type="submit" value="Eliminar">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <input type="checkbox" class="datSelectEdit" value="3">
                                <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ asset('assets/profiles/27028.jpg') }}')"></div>
                                <p class="fontMiriamProSemiBold">Jessica Ramirez</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                                <p>jesi@valdez.com</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                                <p>78797888</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                                <p>44</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                                <p class="gasper">0</p>
                                <p class="gasper">1</p>
                                <p>1</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                                <p class="gasper"> 0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                                <div class="dropdown DropOptinUsersD optionAllUsers">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <a href="usuarios/edit/4">Editar información</a>
                                        </li>
                                        <li>
                                            <a href="usuarios/editHorario/4">Editar horario</a>
                                        </li>
                                        <li>
                                            <form action="Desactive_Users" method="post" accept-charset="utf-8" class="removeUsers">
                                                <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                <input type="hidden" name="ide_user" value="4">
                                                <input type="submit" value="Eliminar">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <input type="checkbox" class="datSelectEdit" value="4">
                                <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ asset('assets/profiles/56810.png') }}')"></div>
                                <p class="fontMiriamProSemiBold">Francisca De Flores</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                                <p>eliza@laptopsvaldez.com</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                                <p>78929999</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                                <p>3006</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                                <p class="gasper">0</p>
                                <p>0</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                                <p class="gasper"> 0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                                <div class="dropdown DropOptinUsersD optionAllUsers">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <a href="usuarios/edit/5">Editar información</a>
                                        </li>
                                        <li>
                                            <a href="usuarios/editHorario/5">Editar horario</a>
                                        </li>
                                        <li>
                                            <form action="Desactive_Users" method="post" accept-charset="utf-8" class="removeUsers">
                                                <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                <input type="hidden" name="ide_user" value="5">
                                                <input type="submit" value="Eliminar">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <input type="checkbox" class="datSelectEdit" value="5">
                                <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ asset('assets/profiles/38742.png') }}')"></div>
                                <p class="fontMiriamProSemiBold">Janixia Palacios</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                                <p>janixia@valdezmobile.com</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                                <p>78654533</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                                <p>11</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                                <div class="ui star rating disabled" data-rating="5"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                                <p class="gasper">0</p>
                                <p>0</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                                <p class="gasper"> 0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                                <div class="dropdown DropOptinUsersD optionAllUsers">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <a href="usuarios/edit/6">Editar información</a>
                                        </li>
                                        <li>
                                            <a href="usuarios/editHorario/6">Editar horario</a>
                                        </li>
                                        <li>
                                            <form action="Desactive_Users" method="post" accept-charset="utf-8" class="removeUsers">
                                                <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                <input type="hidden" name="ide_user" value="6">
                                                <input type="submit" value="Eliminar">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <input type="checkbox" class="datSelectEdit" value="6">
                                <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')"></div>
                                <p class="fontMiriamProSemiBold">Alicia Ortíz</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                                <p>alisia@valdezmobile.com</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                                <p>78939399</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                                <p>13</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                                <p class="gasper">0</p>
                                <p class="gasper">1</p>
                                <p class="gasper">2</p>
                                <p class="gasper">3</p>
                                <p>3</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                                <p class="gasper"> 0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataAllUserSer">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allDatasUser">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 imgAndNameUser">
                                <div class="dropdown DropOptinUsersD optionAllUsers">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <a href="usuarios/edit/7">Editar información</a>
                                        </li>
                                        <li>
                                            <a href="usuarios/editHorario/7">Editar horario</a>
                                        </li>
                                        <li>
                                            <form action="Desactive_Users" method="post" accept-charset="utf-8" class="removeUsers">
                                                <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">
                                                <input type="hidden" name="ide_user" value="7">
                                                <input type="submit" value="Eliminar">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <input type="checkbox" class="datSelectEdit" value="7">
                                <div class="label dataPrubeIm dataProfileAllUsers" style="background-image: url('{{ asset('assets/profiles/67358.png') }}')"></div>
                                <p class="fontMiriamProSemiBold">Julio Durán</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 EmailUser topDatasUser">
                                <p>julio@laptopsvaldez.com</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 CelUsers topDatasUser">
                                <p>76666666</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 ExtUsers topDatasUser">
                                <p>20</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 RankinUsers topDatasUser">
                                <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 AdpUsers topDatasUser">
                                <p class="gasper">0</p>
                                <p>0</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1 NotUses topDatasUser">
                                <p class="gasper"> 0</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 actionAllUsers">
                <a href="addUsers">
                    <p>
                        Nuevo usuario
                    </p>
                </a>

            </div>
            <div class="col-md-12 datPublich publishChatAdmin publichDocuemnts">
                <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
            </div>
        </div>
    </section>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')


    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

@endsection

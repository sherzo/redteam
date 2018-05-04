@extends('layouts.Template-admin')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>3 Solicitudes</h1>
                @include('back-end.partials.fields-name-admin-login')

                <form action="search_solicitudes_suegerencias" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formSearch" method="post" accept-charset="utf-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input type="text" name="user_search" placeholder="Buscar solicitud por nombre de usuario">
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


    {{-- containe Sugerencias --}}
    <section class="container-fluid sectionAdminNotifiMensa containSugerencias">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionSugerenciasData">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menssagesBloques">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allTextMensages captionSolicitudpermiso">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 chexAllsMensages dataSguerenciaDCheck">

                        <form action="home_submit" method="get" accept-charset="utf-8" class="formCheallmensage">
                            <input type="checkbox">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 textAllsMensages dataSguerenciaD">
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 setionMensgaeAllSugere">
                            <a href=""><span>1</span> Solicitudes</a>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 dropsetionMensgae">
                            <p><span>1</span>-5</p>
                            <div class="dropdown dwropOptionMensgae">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <form action="sugerencias_group_delete" method="post" accept-charset="utf-8" class="formGrupoCheckData">
                                            <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </li>
                                    <li>
                                        <form action="sugerencias_group_view" method="post" accept-charset="utf-8" class="formGrupoCheckData">
                                            <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                            <input type="submit" value="Marca como leído">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <form action="admin/sugerencias_group" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="formGrupoCheck">
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" class="dataSelecTSu10" value="10">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>lunes 6 noviembre 2017 17:10:24</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/38742.png')">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3>Janixia Palacios
                                </h3></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Motivo de permiso: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>Quiero vacación</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Fechas: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>2017-11-08 </p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Descuento en: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>Día de Vacación </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="ui accordion">
                            <div class="title">
                                <i class="fa fa-angle-down " aria-hidden="true" data-idsolicitud="10"></i>
                            </div>
                            <div class="content conFormularioReturnMenSage">
                                <p>Responder</p>
                                <div href="#!" class="clActiveMOdalS" data-toggle="modal" data-target="#myModalSolicitudRespuesta" style="display:none;"></div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 formsActions">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 trueSolicituc truwsolos ">
                                        <a href="#!" data-idsolicitudacep="10" data-idusersoli="5">
                                            <p data-tydescuento="1" class="gasper">Día de Vacación </p>
                                            Aceptar
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 DenegeSolicituc densons ">
                                        <a href="#!" data-idsolicitudde="10">
                                            <p data-denegado="3" class="gasper">Día Septimo</p>
                                            Denegar
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 Sendmensage">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed collapseDataPermisos" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Enviar mensaje
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_submit" class="formReturnMennsage conteFormSolicitru" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                            <textarea name="descrip_comen_suge"></textarea>
                                        </div>
                                        <div class="contenMoreDocuments">
                                            <input type="file" class="fileInputAdmin" name="fileinputdocuemnt">
                                        </div>

                                        <div class="contenMoreImages">
                                            <input type="file" class="fileInputAdminImage" name="fileinputimage">
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                            <input type="submit" value="Enviar">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueImageretu">
                                            <img class="img-responsive imImga" onclick="chooseFileImageSuAd();" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">
                                            <img class="img-responsive img1Do" onclick="chooseFileDocuSuAd()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user_sugerencia" value="1">
                                    <input type="hidden" name="id_solicitudse" value="10">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" class="dataSelecTSu6" value="6">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>viernes 14 abril 2017 22:41:17</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3 class="vieCandidate">Jessica Ramirez
                                </h3></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Motivo de permiso: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>Hola necesito permiso para faltar manana y poder ir a turistiar</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Fechas: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>2017-03-30 </p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Descuento en: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>Día Septimo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="ui accordion">
                            <div class="title">
                                <i class="fa fa-angle-down " aria-hidden="true" data-idsolicitud="6"></i>
                            </div>
                            <div class="content conFormularioReturnMenSage">

                                <p>Responder</p>
                                <div href="#!" class="clActiveMOdalS" data-toggle="modal" data-target="#myModalSolicitudRespuesta" style="display:none;"></div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 formsActions">

                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 trueSolicituc truwsolos  disabledbutton ">

                                        <a href="#!" data-idsolicitudacep="6" data-idusersoli="3">
                                            <p data-tydescuento="2" class="gasper">Día Septimo</p>
                                            Aceptar
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 DenegeSolicituc densons  disabledbutton ">
                                        <a href="#!" data-idsolicitudde="6">
                                            <p data-denegado="3" class="gasper">Día Septimo</p>
                                            Denegar
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 Sendmensage">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed collapseDataPermisos" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Enviar mensaje
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_submit" class="formReturnMennsage conteFormSolicitru" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                            <textarea name="descrip_comen_suge"></textarea>
                                        </div>
                                        <div class="contenMoreDocuments">
                                            <input type="file" class="fileInputAdmin" name="fileinputdocuemnt">
                                        </div>
                                        <div class="contenMoreImages">
                                            <input type="file" class="fileInputAdminImage" name="fileinputimage">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                            <input type="submit" value="Enviar">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueImageretu">
                                            <img class="img-responsive imImga" onclick="chooseFileImageSuAd();" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">
                                            <img class="img-responsive img1Do" onclick="chooseFileDocuSuAd()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user_sugerencia" value="1">
                                    <input type="hidden" name="id_solicitudse" value="6">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" class="dataSelecTSu1" value="1">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>sábado 15 abril 2017 21:51:09</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3 class="vieCandidate">Jessica Ramirez
                                </h3></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Motivo de permiso: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>Salida Familiar!</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Fechas: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>2017-03-31 </p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Descuento en: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>Día de Vacación </p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="ui accordion">
                            <div class="title">
                                <i class="fa fa-angle-down " aria-hidden="true" data-idsolicitud="1"></i>
                            </div>
                            <div class="content conFormularioReturnMenSage">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe captionComenSolicitud">
                                    <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                        <h4>Administrador --
                                        </h4>
                                        <p>Solo por eso queres que te permiso??</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe captionComenSolicitud">
                                    <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                        <h4>Jessica Ramirez
                                        </h4>
                                        <p>Si! es que es una salida unica</p>
                                    </div>
                                </div>
                                <p>Responder</p>
                                <div href="#!" class="clActiveMOdalS" data-toggle="modal" data-target="#myModalSolicitudRespuesta" style="display:none;"></div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 formsActions">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 trueSolicituc truwsolos  disabledbutton ">
                                        <a href="#!" data-idsolicitudacep="1" data-idusersoli="3">
                                            <p data-tydescuento="1" class="gasper">Día de Vacación </p>
                                            Aceptar
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 DenegeSolicituc densons  disabledbutton ">
                                        <a href="#!" data-idsolicitudde="1">
                                            <p data-denegado="3" class="gasper">Día Septimo</p>
                                            Denegar
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 Sendmensage">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed collapseDataPermisos" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Enviar mensaje
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_submit" class="formReturnMennsage conteFormSolicitru" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                            <textarea name="descrip_comen_suge"></textarea>
                                        </div>
                                        <div class="contenMoreDocuments">
                                            <input type="file" class="fileInputAdmin" name="fileinputdocuemnt">
                                        </div>
                                        <div class="contenMoreImages">
                                            <input type="file" class="fileInputAdminImage" name="fileinputimage">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                            <input type="submit" value="Enviar">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueImageretu">
                                            <img class="img-responsive imImga" onclick="chooseFileImageSuAd();" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarFoto.png" alt="">
                                            <img class="img-responsive img1Do" onclick="chooseFileDocuSuAd()" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user_sugerencia" value="1">
                                    <input type="hidden" name="id_solicitudse" value="1">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 datPublich publishChatAdmin publishSugerencias">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
        </div>
    </section>

    <!-- Modal -->
    @include('front-end.partials.field-public-post')

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

    <!-- Modal -->
    <div class="modal fade" id="myModalSolicitudRespuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog contAcotionModlas" role="document">
            <div class="modal-content">
                <div class="modal-body captionBodySolicRespuesa">
                    <div class="col-xs-12 col-sm-12 col-md-12 contRevibeSOlic">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="captionEvulveImg" style="background-image: url('{{ asset('assets/assets/profiles/27028.jpg') }}')">
                            </div>
                            <h5 class="aceptSol">Has aceptado la solicitud de</h5>
                            <h5 class="DeneSoli">Has denegado la solicitud de</h5>
                            <h4 class="nameSoliUser">Lisseth Rivas</h4>
                            <h6 class="DescripSoliUser">Se descontará el día septimo en la próxima planilla</h6>
                            <h6 class="descuenDia">Se descontará un día de las vacaciones</h6>
                            <div class="captionDiasvaciones col-md-12">
                                <div class="col-md-12 capsubDays">
                                    <p>14</p>
                                </div>
                            </div>
                            <p class="userDayFaltante">Lisseth tiene <span>14 días</span>  de vacaciones</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')

@endsection

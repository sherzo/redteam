@extends('layouts.Template-admin')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>12 Sugerencias</h1>
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
            <p class="alert alert-success">Su comentario fue creado con exito</p>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menssagesBloques">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allTextMensages">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 chexAllsMensages dataSguerenciaDCheck">

                        <form action="home_submit" method="get" accept-charset="utf-8" class="formCheallmensage">
                            <input type="checkbox">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 textAllsMensages dataSguerenciaD">
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 setionMensgaeAllSugere">
                            <a href=""><span>2</span> Sugerencias nuevas</a>
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
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </li>
                                    <li>
                                        <form action="sugerencias_group_view" method="post" accept-charset="utf-8" class="formGrupoCheckData">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" value="Marca como leído">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="formGrupoCheck">
                    {{-- <input type="checkbox" name="check_sugerencia" class="dataSelecTSu{{ $Sugerencias->id }}" value="{{ $Sugerencias->id }}">                  --}}
                </form>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" class="dataSelecTSu7" value="7">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>lunes 17 abril 2017 15:13:01</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('{{ asset('assets/profiles/38742.png') }}')">
                        </div>

                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3>Janixia Palacios</h3>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <p>hola</p>
                                <div class="dataClicDEsplace">
                                    <div class="ui accordion">
                                        <div class="title">
                                            <i class="fa fa-angle-down " aria-hidden="true" data-idsolicitud="7"></i>
                                        </div>
                                        <div class="content conFormularioReturnMenSage ">
                                            <p class="transition visible" style="display: block !important;">Responder</p>
                                            <form action="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_submit" class="formReturnMennsage transition visible" method="post" accept-charset="utf-8" enctype="multipart/form-data" style="display: block !important;">
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
                                                <input type="hidden" name="id_solicitudse" value="7">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- two  -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" class="dataSelecTSu5" value="5">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>jueves 23 marzo 2017 21:21:15</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('{{ asset('assets/profiles/27028.jpg') }}')">
                        </div>

                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3 class="vieCandidate">Jessica Ramirez</h3>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <p>Recomiendo salir rapido!</p>
                                <div class="dataClicDEsplace">
                                    <div class="ui accordion">
                                        <div class="title ">
                                            <i class="fa fa-angle-down " aria-hidden="true" data-idsolicitud="7"></i>
                                        </div>
                                        <div class="content conFormularioReturnMenSage ">
                                            <p class="transition visible" style="display: block !important;">Responder</p>
                                            <form action="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_submit" class="formReturnMennsage transition visible" method="post" accept-charset="utf-8" enctype="multipart/form-data" style="display: block !important;">
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
                                                <input type="hidden" name="id_solicitudse" value="7">
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!-- tre -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" class="dataSelecTSu4" value="4">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>jueves 23 marzo 2017 20:26:16</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('{{ asset('assets/profiles/27028.jpg') }}')">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3 class="vieCandidate">Jessica Ramirez
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="" data-toggle="modal" data-target="#myModalswAdjunImg"></h3>

                                <div class="modal fade" id="myModalswAdjunImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog dialoDataImgen" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img class="img-responsive" src="{{ asset('assets/images/documents/94537.png') }}" alt="94537.png">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <p>Debe buscar culpable!</p>
                                <div class="dataClicDEsplace">
                                    <div class="ui accordion">
                                        <div class="title ">
                                            <i class="fa fa-angle-down " aria-hidden="true" data-idsolicitud="7"></i>
                                        </div>
                                        <div class="content conFormularioReturnMenSage ">
                                            <p class="transition visible" style="display: block !important;">Responder</p>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe transition visible">
                                                <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                                    <h4>Administrador --
                                                        <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/adjuntarIco.png" alt="" data-toggle="modal" data-target="#myModalswAdjunImgComen3"></h4>

                                                    <div class="modal fade" id="myModalswAdjunImgComen3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog dialoDataImgen" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/documents/17437.jpg" alt="17437.jpg">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>claro, pero porque?</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe transition visible">
                                                <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/73049.jpg')">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                                    <h4>Administrador --</h4>
                                                    <p>claro, pero porque?</p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe transition visible">
                                                <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url('http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/profiles/27028.jpg')">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                                    <h4>Jessica Ramirez</h4>
                                                    <p>Por todo lo que ha pasado.. es necesario buscar el culpable</p>
                                                </div>
                                            </div>
                                            <form action="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/admin/sugerencias_submit" class="formReturnMennsage transition visible" method="post" accept-charset="utf-8" enctype="multipart/form-data" style="display: block !important;">
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
                                                <input type="hidden" name="id_solicitudse" value="7">
                                            </form>
                                        </div>
                                    </div>
                                </div>

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

    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

@endsection

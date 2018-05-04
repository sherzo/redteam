@extends('layouts.Template-admin')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>Documentos</h1>
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

    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno">
            <ul class="listActionDocuemntps">
                <li>
                    <a href="#!" class="createCarpeta">Crear carpeta</a>
                </li>
                <form action="" method="post" accept-charset="utf-8" class="createNewDirec">
                    <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                    <input type="hidden" name="_url" value="">
                    <input type="hidden" name="_url2" value="">
                    <input type="hidden" name="_url3" value="">
                    <input type="hidden" name="_url4" value="">
                    <input type="hidden" name="_url5" value="">
                    <input type="hidden" class="CreateNewActionDirective" name="name_carpeta_new">
                </form>
                <li>
                    <a href="#!" onclick="FileNewDocu()">Subir</a>
                </li>
                <form action="" method="post" accept-charset="utf-8" class="uploadArchivoNew2" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                    <input type="hidden" name="_url" value="">
                    <input type="hidden" name="_url2" value="">
                    <input type="hidden" name="_url3" value="">
                    <input type="hidden" name="_url4" value="">
                    <input type="hidden" name="_url5" value="">
                    <input type="file" class="fileInputUploadDocu2" name="file_input_docuemnt_upload">
                </form>


                <li class="dreopDocument">
                    <div class="dropdown dwropOptionMensgae">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li>
                                <form action="" method="get" accept-charset="utf-8" class="removeElement">
                                    <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                    <input type="hidden" name="_url" value="">
                                    <input type="submit" value="Eliminar">
                                </form>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </section>


    <!--  SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionContenidoDocuemnts">
                <p class="alert alert-success">Documento eliminado</p>
                <p class="alert alert-success">Documento subido con exito</p>
                <p class="alert alert-success">Se ha creado un nuevo directorio</p>
                <!--  En esta pagina vamos obtener los archivos del directorio carpeta admin -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesAdjuntoArchives">
                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-identificador="">
                        <i class="fa fa-check noneIcon direCar" aria-hidden="true"></i>
                        <a href="">
                            <img class="img-responsive" id="contenedor" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" src="{{ asset('assets/images/icons/carpetaVacia.png') }}" alt="">
                            <p class="namedataCarpeta" data-ubicacarpeta="">Carpeta 1</p>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 " data-identificador="">
                        <i class="fa fa-check noneIcon direCar" aria-hidden="true"></i>
                        <a href="">
                            <img class="img-responsive" id="contenedor" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false" src="{{ asset('assets/images/icons/carpetaLlena.png') }}" alt="">
                            <p>Mis archivos</p>
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 dataDowload" data-identificador="" id="parrafo1" draggable="true" ondragstart="drag(this, event)">
                        <i class="fa fa-check noneIcon FilCa" aria-hidden="true"></i>
                        <img class="img-responsive" src="{{ asset('assets/images/icons/dcumento.png') }}" alt="">
                        <form action="" method="post" accept-charset="utf-8" class="dewoDowloas">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_url" value="">
                            <input type="hidden" name="_url2" value="">
                            <input type="hidden" name="_url3" value="">
                            <input type="hidden" name="_url4" value="">
                            <input type="hidden" name="_url5" value="">
                            <input type="hidden" name="_name_archivo" value="">
                        </form>
                        <a href="#!">
                            <p data-element="" data-ubicaciom="">registros</p>
                        </a>
                    </div>


                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 fileUploDat">
                        <img class="img-responsive" onclick="FileNewDocu()" src="{{ asset('assets/images/icons/addFile.png') }}" alt="">
                        <form action="" method="post" accept-charset="utf-8" class="uploadArchivoNew" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_url" value="">
                            <input type="hidden" name="_url2" value="">
                            <input type="hidden" name="_url3" value="">
                            <input type="hidden" name="_url4" value="">
                            <input type="hidden" name="_url5" value="">
                            <input type="file" class="fileInputUploadDocu" name="file_input_docuemnt_upload" />
                        </form>
                    </div>
                </div>

                <!-- end section notificaciones -->


            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">

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

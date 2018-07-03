@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/documents.css') }}">
@endsection
@section('content')

    @include('components.header-admin', [
        'title' => 'Documentos',
        'placeholder' => 'Buscar por nombre de carpeta'
    ])
    <div id="documents">

        <!-- SECTION MENU INTERNO HOME -->
        <section class="container-fluid">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno">
                <ul class="listActionDocuemntps">
                    <li>
                        <a href="#!" class="createCarpeta" @click="addFolder">Crear carpeta</a>
                    </li>
                    <li>
                        <a href="#!" onclick="document.getElementById('inputFile').click()">Subir</a>
                    </li>
                    <li class="dreopDocument">
                        <div class="dropdown dwropOptionMensgae">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li>
                                    <form action="" method="get" accept-charset="utf-8" class="removeElement">
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
        <section class="container-fluid sectionAdminNotifiMensa" v-cloak>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 text-center">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionContenidoDocuemnts">                
                <p class="alert alert-success" v-show="success">@{{ message }}</p>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesAdjuntoArchives">
                   
                    <ol class="breadcrumb" v-show="breadcrumbs.length > 0">
                      <li v-for="b in breadcrumbs" :class="{ 'active': b.id == breadcrumbs[breadcrumbs.length-1].id }"><a href="" @click.prevent="getBreadcrumsSubdocuments(b.id)">@{{ b.name }}</a></li>
                    </ol>

                    <div draggable="true" @dblclick.prevent="open(d)" class="col-xs-6 col-sm-4 col-md-2 col-lg-2"     
                        data-identificador="" 
                        v-for="(d,i) in documents" 
                        :class="{ 'bg-activeDocuemm': d.active }"> 
                        
                        <i class="fa fa-check direCar" aria-hidden="true" @click.prevent.stop="actived(i)"></i>
                        
                        <a href="#">
                            <img class="img-responsive" id="contenedor"
                                 src="{{ asset('assets/images/icons/carpetaVacia.png') }}" alt="" v-if="!d.type && d.id != selected.id">
                            
                            <img class="img-responsive" id="contenedor"
                                 src="{{ asset('assets/images/icons/carpetaLlena.png') }}" alt="" v-else-if="!d.type && d.id == selected.id">
                            
                            <img class="img-responsive" src="{{ asset('assets/images/icons/dcumento.png') }}" v-else>
                            <p class="namedataCarpeta" data-ubicacarpeta="">@{{ d.name }}</p>
                        </a>
                    </div>

                    <div  @click.prevent="selectDocument(s)"
                        class="col-xs-6 col-sm-4 col-md-2 col-lg-2"     
                        data-identificador="" 
                        v-for="(s,i) in subdocuments" 
                        :class="{ 'bg-activeDocuemm': s.active,
                         'isSelected': selected.id == s.id }" > 
                        
                        <i class="fa fa-check direCar" aria-hidden="true" @click.prevent.stop="actived(i)"></i>
                        
                        <a href="">
                            <img class="img-responsive" id="contenedor"
                                 src="{{ asset('assets/images/icons/carpetaVacia.png') }}" alt="" v-if="!d.type && d.id != selected.id">
                            
                            <img class="img-responsive" id="contenedor"
                                 src="{{ asset('assets/images/icons/carpetaLlena.png') }}" alt="" v-else-if="!d.type && d.id == selected.id">
                            
                            <img class="img-responsive" src="{{ asset('assets/images/icons/dcumento.png') }}" v-else>
                            <p class="namedataCarpeta" data-ubicacarpeta="">@{{ s.name }}</p>
                        </a>
                    </div>

                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 fileUploDat">
                        <form action="">
                            <img class="img-responsive"  src="{{ asset('assets/images/icons/addFile.png') }}" alt="" onclick="document.getElementById('inputFile').click()" style="margin-top: 30px">
                            <input type="file" ref="myFile" id="inputFile" style="display: none;" @change="uploadFile">
                        </form>
                    </div>
                </div>
                <!-- end section notificaciones -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            </div>

            <div class="col-md-12 datPublich publishChatAdmin publichDocuemnts">
                <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
            </div>
            </div>
        </section>
    
    </div>

    <!-- Modal -->
    <span id="publications">
        @include('components.publication')
    </span>

    <!-- Modal NOTIFICACIONES -->
    @include('components.modal-notifications')
@endsection

@section('js')
<script src="{{ asset('assets/js/src/document.js') }}"></script>
<script src="{{ asset('assets/js/src/admin_notification.js') }}"></script>
<script src="{{ asset('assets/js/src/publication_admin.js') }}"></script>
@endsection
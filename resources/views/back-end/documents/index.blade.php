@extends('layouts.admin')
@section('css')
<style>    
.loader {
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 40px;
  height: 40px;
  -webkit-animation: spin .9s linear infinite; /* Safari */
  animation: spin .9s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
i.direCar {
    float: right;
    margin-top: 5px;
}
.bloquesAdjuntoArchives>div {
    color: transparent;
}
.isSelected {
    background: #adecbc;
}
.bloquesAdjuntoArchives>div:hover {
    border: 1px solid #eaeaea;
    color: black;
}
</style>
@endsection
@section('content')
<div id="documents">
    @include('components.header-admin', [
        'title' => 'Documentos',
        'placeholder' => 'Buscar por nombre de carpeta'
    ])

    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid" id="documents">
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
                {{--
                <p class="alert alert-success">Documento eliminado</p>
                <p class="alert alert-success">Se ha creado un nuevo directorio</p>
                <!--  En esta pagina vamos obtener los archivos del directorio carpeta admin -->
                    --}}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloquesAdjuntoArchives">
                    
                    <div draggable="true" @click.prevent="selectDocument(d)" class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-identificador="" v-for="(d,i) in documents" :class="{ 'bg-activeDocuemm': d.active, 'isSelected': selected.id == d.id }" > 
                        <i class="fa fa-check direCar" aria-hidden="true" @click.prevent.stop="actived(i)"></i>
                        <a href="">
                            <img class="img-responsive" id="contenedor"
                                 src="{{ asset('assets/images/icons/carpetaVacia.png') }}" alt="" v-if="!d.type && d.id != selected.id">
                            
                            <img class="img-responsive" id="contenedor"
                                 src="{{ asset('assets/images/icons/carpetaLlena.png') }}" alt="" v-else-if="!d.type && d.id == selected.id">
                            
                            <img class="img-responsive" src="{{ asset('assets/images/icons/dcumento.png') }}" v-else>
                            <p class="namedataCarpeta" data-ubicacarpeta="">@{{ d.name }}</p>
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
         <div class="col-md-12 text-center">
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
<script src="{{ asset('assets/js/src/document.js') }}"></script>
@endsection
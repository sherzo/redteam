@extends('layouts.admin')

@section('content')        
    
    @include('components.header-admin', [
        'title' => 'Usuarios',
        'placeholder' => 'Buscar usuarios por su nombre'
    ])

<div id="publications">
    
    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid" >
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno">
            <ul class="listActionDocuemntps">
                <li ><a href="{{ url('admin/home') }}">Home</a></li>
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
        <div class="col-md-12">
            @include('flash::message')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido centerContentAllUSer">
                    
                @include('back-end.users.partials.table')
            
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 actionAllUsers">
                <a href="{{ route('users.create') }}">
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
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog contPusblishDialogo" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                                <form class="sectionPublichUser" accept-charset="utf-8" @submit.prevent="addPublication" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <textarea name="" v-model="description" placeholder="Escribe un comentario"></textarea>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions">
                                        <div class="col-md-6 actionpuBlish">
                                            {{--

                                                --}}
                                            <div class="col-md-2 Adjuntar">

                                                <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="" onclick="document.getElementById('fileInput').click()">
                                                <input type="file" id="fileInput" ref="myFile" style="display: none" @change="getFile">
                                            </div>
                                           {{--
                                            --}}

                                            <div class="col-md-2 AdjuntarFoto" onclick="document.getElementById('imageInput').click()">
                                                <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                                <input type="file" id="imageInput" ref="myImage" style="display: none" @change="getImage">
                                            </div>
                                            {{--

                                                --}}
                                            
                                            <div class="col-md-2 DestacarPuslish" @click="selectFeatured" >
                                                <img class="img-responsive" src="{{ asset('assets/images/avatar/destacarIco.png') }}" alt="">
                                            </div>
                                            <div class="col-md-2 AlertPublish" @click="selectEmergency">
                                                <img class="img-responsive" src="{{ asset('assets/images/avatar/alertIco.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 ButtinPublish">
                                            <input type="submit" value="Enviar"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

    {{--@include('front-end.partials.field-public-post')
--}}
    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')


    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

@endsection

@section('js')
{{--
 <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
--}}
<script src="{{ asset('assets/js/src/publication_admin.js') }}"></script>
@endsection
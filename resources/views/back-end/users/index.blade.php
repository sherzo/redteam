@extends('layouts.admin')

@section('content')
    
    @include('components.header-admin', [
        'title' => 'Usuarios',
        'placeholder' => 'Buscar usuarios por su nombre'
    ])

    <!-- SECTION MENU INTERNO HOME -->
    <section class="container-fluid">
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
    </section>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')


    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

@endsection

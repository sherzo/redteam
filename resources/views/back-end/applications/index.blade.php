@extends('layouts.admin')

@section('css')
<style>
    .fade-enter-active, .fade-leave-active {
  transition: opacity .3s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
@endsection

@section('content')

    @include('components.header-admin', [
        'title' => 'Solicitudes de permiso',
        'placeholder' => 'Buscar solicitud por nombre de usuario'
    ])

    {{-- containe Sugerencias --}}
    <section class="container-fluid sectionAdminNotifiMensa containSugerencias" id="applications">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionSugerenciasData"
 v-cloak>
            <p class="alert alert-success" v-show="success">@{{ message }}</p>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menssagesBloques">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allTextMensages captionSolicitudpermiso">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 chexAllsMensages dataSguerenciaDCheck">

                        <form action="home_submit" method="get" accept-charset="utf-8" class="formCheallmensage">
                            <input type="checkbox" v-model="checkAll">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 textAllsMensages dataSguerenciaD">
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 setionMensgaeAllSugere">
                            <a href=""><span>@{{ applications.length }}</span> Solicitudes nuevas</a>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 dropsetionMensgae" :class="{ dwropOptionMensgaeActive: isChecked }">
                            <p><span>1</span>-5</p>
                            <div class="dropdown dwropOptionMensgae">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                         <form action="" @submit.prevent="deletes" method="post" accept-charset="utf-8" class="formGrupoCheckData">
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </li>
                                    <li>
                                       <form  @submit.prevent="markAsRead" class="formGrupoCheckData">
                                            <input type="submit" value="Marca como leĂ­do">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="admin/sugerencias_group" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="formGrupoCheck">
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="(a,i) in applications">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" v-model="checkeds" class="dataSelecTSu4" :value="a.id">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>@{{ a.created_at }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + a.user.avatar + ')' }">
                            
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3>@{{ a.user.name }}
                                </h3></div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Motivo de permiso: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>@{{ a.description }}</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Fechas: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p>@{{ a.date }} </p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 createMotive">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 motivePermiso">
                                        <span> Descuento en: </span>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 descriptMotivo">
                                        <p v-if="a.discount">Día de Vación</p>
                                        <p v-else="">Día Séptimo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="title">
                                <i class="fa fa-angle-up" v-show="a.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i)"></i>
                                <i class="fa fa-angle-down " v-show="!a.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i)"></i>                </div>
                            
                            <transition name="fade">
                                <div class="content conFormularioReturnMenSage"  v-show="a.accordion">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe captionComenSolicitud" v-for="(d, index) in a.discussions">
                                        <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + d.user.avatar + ')' }">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                            <h4>@{{ d.user.name }}
                                            </h4>
                                            <p>@{{ d.description }}</p>
                                        </div>
                                    </div>            
                                    <p>Responder</p>
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 formsActions" >
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 trueSolicituc truwsolos" @click="aceptOrDenied(i, 1)"  data-toggle="modal" data-target="#myModalSolicitudRespuesta">
                                            <a href="#!" data-idsolicitudacep="1" data-idusersoli="3" >
                                                <p data-tydescuento="1" class="gasper">Día de Vacación </p>
                                                Aceptar
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 DenegeSolicituc densons" @click="aceptOrDenied(i, 0)"data-toggle="modal" data-target="#myModalSolicitudRespuesta" >
                                            <a href="#!" data-idsolicitudde="1">
                                                <p data-denegado="3" class="gasper">Día Septimo</p>
                                                Denegar
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 Sendmensage" @click="a.send = true">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed collapseDataPermisos" role="button">
                                                                Enviar mensaje
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <transition name="fade">
                                        <form action="" @submit.prevent="addDiscussion(i)" class="formReturnMennsage " method="post" accept-charset="utf-8" enctype="multipart/form-data" v-show="a.send">
                                            <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                                    <textarea name="descrip_comen_suge" v-model="a.discussion"></textarea>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                                    <input type="submit" value="Enviar">
                                                </div>
                                               
                                            </div>
                                            <input type="hidden" name="id_user_sugerencia" value="1">
                                            <input type="hidden" name="id_solicitudse" value="1">
                                        </form>
                                    </transition>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages text-center" v-show="applications.length == 0" style="padding: 40px">
                    <p>No hay solicitudes de permiso pendientes</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 datPublich publishChatAdmin publishSugerencias">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
        </div>

        <!-- Modal Publicacion  -->        
        @include('components.publication')
    </section>


    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>

    <!-- Modal NOTIFICACIONES -->
    @include('components.modal-notifications')

@endsection

@section('js')
<script src="{{ asset('assets/js/src/application.js') }}"></script>
<script src="{{ asset('assets/js/src/admin_notification.js') }}"></script>
@endsection
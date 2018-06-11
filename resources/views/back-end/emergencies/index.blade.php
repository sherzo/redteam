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
        'title' => 'Emergencias',
        'placeholder' => 'Buscar emergencia por nombre de usuario'
    ])

    {{-- containe Sugerencias --}}
    <section class="container-fluid sectionAdminNotifiMensa containSugerencias" id="emergencies">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionSugerenciasData" v-cloak>
            <p class="alert alert-success" v-show="success">@{{ message }}</p>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menssagesBloques">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 allTextMensages captionEmergencias">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 chexAllsMensages dataSguerenciaDCheck">

                        <form action="home_submit" method="get" accept-charset="utf-8" class="formCheallmensage">
                            <input type="checkbox" v-model="checkAll">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 textAllsMensages dataSguerenciaD">
                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 setionMensgaeAllSugere">
                            <a href=""><span>@{{ emergencies.length }}</span> Emergencias nuevas</a>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 dropsetionMensgae">
                            <p><span>1</span>-5</p>
                            <div class="dropdown dwropOptionMensgae" :class="{ dwropOptionMensgaeActive: isChecked }">
                                <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <form action="sugerencias_group_delete" method="post" accept-charset="utf-8" class="formGrupoCheckData">
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </li>
                                    <li>
                                        <form  @submit.prevent="markAsRead" class="formGrupoCheckData">
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

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="(e,i) in emergencies">
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 checkMEnsagge">
                        <form action="" method="post" accept-charset="utf-8" class="selectMensage">
                            <input type="checkbox" name="check_sugerencia" v-model="checkeds" class="dataSelecTSu4" :value="e.id">
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                            <p>@{{ e.created_at }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + e.user.avatar + ')' }">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                                <h3 class="vieCandidate">@{{ e.user.name }}
                                    <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="" data-toggle="modal" data-target="#myModalswAdjunImg" v-show="e.image" alt="imagen" @click="showImage(e.image)">
                                    
                                    <a :download="e.file" href="" style="display: inline-block;"  v-show="e.file" >
                                        <img class="img-responsive"   alt="documento"  src="{{ asset('assets/images/avatar/adjuntarIco.png') }}">
                                    </a>
                                    
                                </h3>

                                
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                                <p>@{{ e.description }}</p>
                                <div class="dataClicDEsplace">
                                    <div class="">
                                        <div class="title ">
                                            <i class="fa fa-angle-up" v-show="e.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i)"></i>
                                            <i class="fa fa-angle-down " v-show="!e.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i)"></i>                                        
                                        </div>

                                        <transition name="fade">
                                        
                                        <div class="content conFormularioReturnMenSage " v-show="e.accordion">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe transition visible" v-for="(d, index) in e.discussions">
                                                <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                                    <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + d.user.avatar + ')' }">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                                    <h4>@{{ d.user.name }}
                                                        <img class="img-responsive" v-show="d.image" :src="d.image" alt="" data-toggle="modal" data-target="#myModalswAdjunImg" @click="showImage(d.image)">
                                                        <img class="img-responsive img1Do" :src="d.file" download=""  alt="">
                                                    </h4>

                                                    <p>@{{ d.description }}</p>
                                                </div>
                                            </div>
                                            <p class="transition visible" style="display: block !important;">Responder</p>
                                            <form action="" class=" formReturnMennsage transition visible" method="post" @submit.prevent="addDiscussion(i)" accept-charset="utf-8" enctype="multipart/form-data" style="display: block !important;">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                                        <textarea name="descrip_comen_suge" v-model="e.discussion"></textarea>
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
                                                        <img class="img-responsive imImga"  onclick="document.getElementById('imageInputE').click()" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                                        <input type="file" id="imageInputE" ref="emergecyImage" style="display: none" @change="getEmergencyImage">

                                                        <img class="img-responsive img1Do"  onclick="document.getElementById('fileInputE').click()" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                                                        <input type="file" id="fileInputE" ref="emergencyFile" style="display: none" @change="getEmergencyFile">

                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_user_sugerencia" value="1">
                                                <input type="hidden" name="id_solicitudse" value="7">
                                            </form>
                                        </div>
                                        </transition>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages text-center" v-show="emergencies.length == 0" style="padding: 40px">
                    <p>No hay emergencias pendientes</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 datPublich publishChatAdmin publishSugerencias">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt=""  data-toggle="modal" data-target="#myModalNotifications">
        </div>

        {{--  MODAL DE LA IMAGEN --}}
        <div class="modal fade" id="myModalswAdjunImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog dialoDataImgen" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <img class="img-responsive" :src="modal.image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL DE LA IMAGEN --}}
        
        <!-- Modal PUBLICATIONS -->
        @include('components.publication')
        <!-- Modal -->
    </section>



    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')

    <div class="alert alert-info dataClMoPosPEr" role="alert">ÂĄPublicacion Agregada!</div>

@endsection

@section('js')
<script src="{{ asset('assets/js/src/emergency.js') }}"></script>
@endsection
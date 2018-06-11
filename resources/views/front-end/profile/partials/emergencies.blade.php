<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 permission">
    <h3>Solicitudes de Sugerencias</h3>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="(e, i) in emergencies">
        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                <p>@{{ e.created_at }}</p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + e.user.avatar + ')' }">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                    <h3 class="vieCandidate">@{{ e.user.name }}</h3>
                    <h3>Lisset Rivas </h3>

                    <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="" data-toggle="modal" data-target="#myModalswAdjunImg" v-show="e.image" @click="showImage(e.image)"></h3>

                    

                   <a :download="e.file" href="" style="display: inline-block;">
                        <img class="img-responsive"   alt="documento"  v-show="e.image"  src="{{ asset('assets/images/avatar/adjuntarIco.png') }}">
                    </a>
                </h3>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                    <p>@{{ e.description }}</p>
                </div>
            </div>
        </div>
        <div class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="">
                <div class="title">
                    <i class="fa fa-angle-up" v-show="e.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i, 'emergencies')"></i>
                    <i class="fa fa-angle-down " v-show="!e.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i, 'emergencies')"></i>
                </div>
                <transition name="fade">
                    <div class="content conFormularioReturnMenSage" v-show="e.accordion">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe captionComenSolicitud" v-for="(d, index) in e.discussions">
                            <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + d.user.avatar + ')' }">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                <h4>@{{ d.user.name }}
                                    <img class="img-responsive" v-show="d.image" :src="d.image" alt="" data-toggle="modal" data-target="#myModalswAdjunImg" @click="shoImage(d.image)">

                                    <img class="img-responsive img1Do" :src="d.file" download=""  alt="">
                                
                                </h4>
                                <p>@{{ d.description }}</p>
                            </div>
                        </div>
                        <p>Responder</p>
                        <div href="#!" class="clActiveMOdalS" data-toggle="modal" data-target="#myModalSolicitudRespuesta" style="display:none;"></div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 formsActions" @click="e.send = true">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 Sendmensage">
                                <div class="panel-group" id="accordionq" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed collapseDataPermisos" role="button" data-toggle="collapse" data-parent="#accordionq" href="#collapseTwoEmer" aria-expanded="false" aria-controls="collapseTwoEmer">
                                                    Enviar mensaje
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" class="formReturnMennsage" @submit.prevent="addDiscussion(i, 'emergencies')"  method="post" accept-charset="utf-8" enctype="multipart/form-data" v-show="e.send">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                    <textarea name="descrip_comen_suge" v-model="e.discussion"></textarea>
                                </div>
                                <div class="contenMoreDocuments">
                                    <input type="file" class="fileInputAdmin" name="fileinputdocuemnt" />
                                </div>

                                <div class="contenMoreImages">
                                    <input type="file" class="fileInputAdminImage" name="fileinputimage" />
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                    <input type="submit" value="Enviar">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueImageretu">
                                    <img class="img-responsive imImga" onclick="chooseFileImageSuAd();" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                    <img class="img-responsive img1Do" onclick="chooseFileDocuSuAd()" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                                </div>
                            </div>
                            <input type="hidden" name="id_user_sugerencia" value="">
                            <input type="hidden" name="id_solicitudse" value="">
                        </form>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</div>

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
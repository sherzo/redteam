<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 permission" id="suggestions">
    <h3>Solicitudes de Sugerencias</h3>
    
    <p class="alert alert-success" v-show="success">@{{ message }}</p>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="(s,i) in suggestions">
        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                <p>@{{ s.created_at }}</p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + s.user.avatar + ')' }">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                    <h3 class="vieCandidate">@{{ s.user.name }}</h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 typeUisersMensage">
                    <p>@{{ s.description }}</p>
                </div>
            </div>
        </div>
        <div class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="">
                <div class="title">
                    <i class="fa fa-angle-up" v-show="s.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i, 'suggestions')"></i>
                    <i class="fa fa-angle-down " v-show="!s.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i, 'suggestions')"></i>
                </div>
                <transition name="fade">

                    <div class="content conFormularioReturnMenSage" v-show="s.accordion">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe captionComenSolicitud" v-for="(d, index) in s.discussions">
                            <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1 captionCOmetsReceibeIMgUser">
                                <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + d.user.avatar + ')' }">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-11 col-lg-11 captionCOmetsReceibeDescriUserCOmen">
                                <h4>@{{ d.user.name }}</h4>
                                <p>@{{ d.description }}</p>
                            </div>
                        </div>
                        <p>Responder</p>
                        <div href="#!" class="clActiveMOdalS" data-toggle="modal" data-target="#myModalSolicitudRespuesta" style="display:none;"></div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 formsActions"  @click="s.send = true" v-show="!s.send">
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

                         <form action="" class="formReturnMennsage" @submit.prevent="addDiscussion(i, 'suggestions')"  method="post" accept-charset="utf-8" enctype="multipart/form-data" v-show="s.send">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                    <textarea name="descrip_comen_suge" v-model="s.discussion"></textarea>
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
                            </div>
                        </form>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</div>
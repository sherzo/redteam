<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 permission">
    <h3>Solicitudes de Permisos</h3>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="(a,i) in applications">
        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                <p>@{{ a.created_at }}</p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + a.user.avatar + ')' }">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                    <h3 class="vieCandidate">@{{ a.user.name }}</h3>
                </div>
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
                            <p>@{{ a.date }}</p>
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
                    <i class="fa fa-angle-up" v-show="a.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i, 'applications')"></i>
                    <i class="fa fa-angle-down " v-show="!a.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i, 'applications')"></i>     
                </div>
                <transition name="fade">
                    <div class="content conFormularioReturnMenSage" v-show="a.accordion">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe captionComenSolicitud" v-for="(d, index) in a.discussions">
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
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12 formsActions">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 soliAceptadaD" v-if="a.status">
                                <!-- SOLICTUD ACEPTADA -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 solicitudAceptada">
                                    <h1>¡Tu solicitud fue aceptada!</h1>
                                    <h4 v-if="a.discount">Se ha descontado un día de sus vacaciones anuales</h4>
                                    <h4 v-else>Se descontará el día septimo en la próxima planilla</h4>
                                    <!-- Dias disponibles  -->
                                    @include('front-end.partials.fields-day-vacaciones-users')
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 soliDetemnegadae" v-else-if="a.status === 0">
                                <p>Su Solicitud ha sido denegada</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 soliAceptadaD" v-if="a.status == null">
                                <p>Su Solicitud esta en proceso</p>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 Sendmensage" @click="a.send = true" v-show="!a.send">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed collapseDataPermisos" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Enviar mensaje
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <transition name="fade">
                            <form action="" class="formReturnMennsage" method="post" accept-charset="utf-8" enctype="multipart/form-data"  @submit.prevent="addDiscussion(i, 'applications')" v-show="a.send">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                        <textarea name="descrip_comen_suge" v-model="a.discussion"></textarea>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                         <input type="submit" value="Enviar">
                                    </div>
                        
                                </div>
                            </form>
                        </transition>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</div>
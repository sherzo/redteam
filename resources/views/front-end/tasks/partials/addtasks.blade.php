<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 permission" id="suggestions">
    <h3>Agregar tareas a los empleados</h3>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages" v-for="(e,i) in employees">
        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
                <p>@{{ e.created_at }}</p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" :style="{ 'background-image': 'url(' + e.avatar + ')' }">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                    <h3 class="vieCandidate">@{{ e.name }} @{{ e.lastname }}</h3>
                </div>
            </div>
        </div>
        <div style="padding: 10px" class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="">
                <div class="title">
                    <i class="fa fa-angle-up correct" v-show="e.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i)"></i>
                    <i class="fa fa-angle-down correct" v-show="!e.accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleAccordion(i)"></i>
                </div>
                <transition name="fade">
                    <div class="content conFormularioReturnMenSage" v-show="e.accordion">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe " v-for="(t, index) in e.tasks">
                            <form action="" class="formReturnMennsage" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 textAreaReturn">
                                        <textarea placeholder="Agregar tarea al empleado" v-model="t.description"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 text-center">
                           <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 submitSendSugerencia">
                                <input type="submit" value="Enviar" @click="store">
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</div>
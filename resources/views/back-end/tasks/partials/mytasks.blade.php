<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 permission" id="suggestions">
    <h3>Tareas del día</h3>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contectAllMenssages">
        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 textAllsMensages">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fchaUisersMensage">
            </div>
            <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1 secFotoUser" style="background-image: url({{ Auth::user()->avatar }}); margin-left: 30px;">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-11 col-lg-11 sectioForMEnsagen secdataTextMensage">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nameUisersMensage">
                    <h3 class="vieCandidate">{{ Auth::user()->full_name }}</h3>
                </div>
            </div>
        </div>
        <div style="padding: 10px;" class="dataClicDEsplace deplaceDatSolictudes col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="">
                <div class="title">
                    <i class="fa fa-angle-up correct" v-show="accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleTasks"></i>
                    <i class="fa fa-angle-down correct" v-show="!accordion" aria-hidden="true" data-idsolicitud="7" @click="toggleTasks"></i>
                </div>
                <transition name="fade">
                    <div class="content conFormularioReturnMenSage" v-show="accordion">
                        <hr>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe " v-for="(t, index) in tasks">
                            <form action="" class="formReturnMennsage" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textAreaReturn">
                                        <p >
                                        <input type="checkbox" @click="complete(index)" :checked="t.status" :id="'taks' + index">&nbsp;&nbsp;&nbsp;
                                        <label :class="{ 'taskComplete': t.status }" :for="'taks' + index">@{{ t.description }}</label></p>
                                        <hr>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 captionCOmetsReceibe " v-show="tasks.length == 0">
                            <h4>Aún no tienes tareas asignadas</h4>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</div>
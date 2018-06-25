<div class="modal fade adminNotification" id="myModalNotifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog contPusblishDialogo" role="document">
        <div class="modal-content">
            <div class="modal-body contpublishNotifs">
                <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                    <div class="alert alert-success" v-show="success">
                       @{{ success }} 
                    </div>
                    <!-- FORM ADD NOTIFI -->
                    <form action="" method="post" class="sectionPublichUser sectionPubliNotifis" accept-charset="utf-8" @submit.prevent="sendNotification">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <select name="id_tipo_evento" 
                                v-model="id_notification"
                                class="text-white" 
                                style="color: white;" 
                                :style="{ 'background': showColor }">

                                <option value="">Seleccione notificación</option>
                                <option :style="{ 'background': n.color }" 
                                        class="text-white" 
                                        :value="n.id" 
                                        v-for="(n,i) in notifications" style="padding: 10px;">
                                        @{{ n.title }}
                                </option>

                            </select>
                        </div>
                        <div class="col-md-6 ButtinPublish butPulchNotfi">
                            <input type="submit" value="Enviar"></input>
                        </div>
                    </form>
                    <!-- end FORM ADD NOTIFI -->

                    <!-- FORM CREATE NOTIFI -->
                    <form action="" method="post" accept-charset="utf-8" @submit.prevent="newNotification">
                        <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions bloqueActionAddNodui">
                            <div class="ui">
                                <div class="title text-muted" @click="addNew = !addNew">
                                    Agregar nueva notificación +
                                </div>
                                <br>
                                <div class="alert alert-warning" v-show="err != ''">
                                    @{{ err }}
                                </div>
                                <transition name="fade">
                                    <div class="content contentAddNotify" v-show="addNew">
                                        <input type="text" name="title_notifi" placeholder="Titulo de Notificación" v-model="title">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contAreaSelectColro">
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloQUeAReDes" style="margin-bottom: 0;">
                                                <textarea v-model="desc" placeholder="Escriba notificación" required></textarea>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloQUeAReDes bloquESelcPicker" style="margin-bottom: 0;">
                                                <input type='text' name="color_notify" id="showPaletteOnly"/>
                                                <br />
                                                <span class='label'>Choose a color</span>
                                            </div>
                                        </div><br>
                                        <small class="text-muted">Recuerda no repetir el color, para no confundir las notificaciones*</small><br><br>
                                        <input type="submit" class="submitForCreateNotifi" value="Crear Notificación">
                                    </div>
                                </transition>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM CREATE NOTIFI  -->
                </div>
            </div>
        </div>
    </div>
</div>
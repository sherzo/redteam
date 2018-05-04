<div class="modal fade" id="myModalNotifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog contPusblishDialogo" role="document">
        <div class="modal-content">
            <div class="modal-body contpublishNotifs">
                <div class="col-xs-12 col-sm-12 col-md-12 continPublish">

                    <!-- FORM ADD NOTIFI -->
                    <form action="" method="post" class="sectionPublichUser sectionPubliNotifis" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <input type="hidden" class="post_evnt" name="post_evento" value="6">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <select name="id_tipo_evento">
                                <option>Seleccione notificación</option>
                                <option value="" style="background: red; color:white" >Feurtes sismo</option>
                                <option value="" style="background: green; color:white" >Mañana habra un gran evento</option>
                            </select>
                        </div>
                        <div class="col-md-6 ButtinPublish butPulchNotfi">
                            <input type="submit" value="Enviar"></input>
                        </div>
                    </form>
                    <!-- end FORM ADD NOTIFI -->

                    <!-- FORM CREATE NOTIFI -->
                    <form action="" method="post" accept-charset="utf-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions bloqueActionAddNodui">
                            <div class="ui accordion">
                                <div class="title">
                                    Agregar nueva notificación +
                                </div>
                                <div class="content contentAddNotify">
                                    <input type="text" name="title_notifi" placeholder="Titulo de Notificación" required>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contAreaSelectColro">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloQUeAReDes">
                                            <textarea name="descrip_notify" placeholder="Escriba notificación" required></textarea>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 bloQUeAReDes bloquESelcPicker">
                                            <input type='text' name="color_notify" id="showPaletteOnly"/>
                                            <br />
                                            <span class='label'>Choose a color</span>
                                        </div>
                                    </div>
                                    <h4>Recuerda no repetir el color, para no confundir las notificaciones*</h4>
                                    <input type="submit" class="submitForCreateNotifi" value="Crear Notificación">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM CREATE NOTIFI  -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chatVentanan">
    <div class="continerChatVent">
        <div class="bg-bar-name">
            <p>Alexandra portillo</p>
        </div>
        <div class="bg-bar-body">
        </div>
        <div class="bg-bar-footer">
            <div class=data-footerSend>
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos captionChat">
                    {{-- bloque chat --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatCOntentUsers">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userCOntentChat chat_box">
                        </div>
                    </div>
                    {{-- bloque enviar Mensaje --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatSendUsers">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userCOntentSend">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 contenTexaArea chat_box">
                                <textarea name="" class="input_message form-control"  placeholder="Escribe aquí"></textarea>
                                <input type="hidden" class="input_id_user_logi" value="{{ Auth::user()->id }}" />
                                <input type="hidden" class="input_name DatIdUserChat" value="" />
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 contentActionSend chat_box">
                                <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                                <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                <input type="submit" value="Enviar" class="input_send">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.admin')

@section('css')
<style>
    .contenMoreImages img {
        display: block;
        position: relative;
    }

    .contenMoreImages i {
        position: absolute;
        display: block;
    }
    
    .selected {
        background-color: #f1f0f1;
    }

    .captionCircleUser {
        margin: 4px;
    }
    
    img.right {
        float: right;
    }

    img.border-img {
        border: 2px solid #0071bc;
        margin: 8px 5px;
        border-radius: 5px;
    }
    .img-circle {
        border-radius: 50%;
    }
    .all-users {
        width: 45px;
    }
    .captionPosteos {
        padding: 0;
        background: white;
        margin-bottom: 7%;
        box-shadow: 0px 2px 10px 1px #e2e2e2;
    }

    .ChatCOntentUsers {
        width: 100%;
    height: 500px;
    background: white;
    overflow: auto;
    }
    .userCOntentChat.chat_box {
        box-shadow: 0px 0px 0px 0px #e2e2e2;
    }
    .userCOntentSend {
        background: #f7f7f7;
    }
</style>
@endsection

@section('content')
   
    @include('components.header-admin', [
        'placeholder' => 'Buscar usuarios por su nombre',
        'chat' => true
    ])

    {{-- SECTION BLOQUE NOTIFICACION Y MENSAJES --}}
    <section class="container-fluid sectionAdminNotifiMensa continChatAdmins" id="chats" v-cloak>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos captionChat">

                    {{-- CABECERA --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatWithUser">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatWithUserDatas" v-if="chat.id">
                             <img class="img-responsive img-circle" :src="chat.transmitter.avatar" alt=""v-if="chat.transmitter_id != user_id" >
                            
                            <img class="img-responsive img-circle" :src="chat.receiver.avatar" alt="" v-else>

                            
                            <p class="colorBlack fontMiriamProSemiBold" v-if="chat.transmitter_id != user_id">@{{ chat.transmitter.name }} @{{ chat.transmitter.lastname }}</p>
                            <p class="colorBlack fontMiriamProSemiBold" v-else>@{{ chat.receiver.name }} @{{ chat.receiver.lastname }}</p>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatWithUserDatas" v-else>
                            <p class="text-center text-muted" style="color:black;">
                                <small style="color: black;">No ha seleccionado conversación</small>
                            </p>
                        </div>
                    </div>

                    {{-- BANDERJA --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatCOntentUsers" id="bandeja">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userCOntentChat chat_box" >

                            <div class="col-lg-12 MensaGedate getSenMenIds2" :class="{ 'getUserReceive': m.user_id != user_id, 'getUserSend': m.user_id == user_id  }" v-for="m in messages">
                                
                                {{-- Si es solo texto --}}
                                <div class="col-lg-12 wrapMensage envMensgaRce2" v-if="m.type == 0"><p>@{{ m.content }}</p>
                                </div>

                                {{-- Si es una imagen --}}
                                <div>
                                    <img :src="m.content" alt="" class="img-responsive border-img" width="200" v-if="m.type == 1" :class="{ 'right': m.user_id == user_id }">
                                </div>
                                
                                {{-- Si es un archivo --}}
                                <div class="col-lg-12 wrapMensage envMensgaRce2" v-if="m.type == 2"><p>
                                    <a :download="m.content" href="" >
                                    <img src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="" class="img-responsive">
                                        
                                    </a>
                                </p></div>
                            </div>
                            
                        </div>
                    </div>

                    {{-- Nuevo mensaje --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatSendUsers">
                        {{----}}
                         <form id="formuploadajax" class="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" @submit.prevent="sendMessage">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userCOntentSend">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 contenTexaArea chat_box">
                                <textarea name="" class="input_message form-control" placeholder="Escribe aquí" v-model="content" @keyup.enter="sendMessage" :disabled="uploadFile != 0"></textarea>

                                <div class="contenMoreImages">
                                    <img :src="showImage" alt="" width="100" height="100" v-show="showImage != ''">
                                    <input type="file" class="fileInputImageChat1" ref="myFile">
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 contentActionSend chat_box">
                                        
                                <div class="anjunFoto">
                                    <img class="img-responsive imImgaChat" onclick="document.getElementById('imageInputC').click()" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="" >
                                    
                                    <input type="file" class="fileInputImageChat1" id="imageInputC" ref="chatImage" style="display: none" @change="getChatImage">

                                </div>
                                <div class="anjunDocu">
                                    <img class="img-responsive img1DoChat" onclick="document.getElementById('fileInputC').click()" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                                    
                                    <input type="file" class="fileInputImageChat1" id="fileInputC" ref="chatFile" style="display: none" @change="getChatFile">
                                    
                                </div>

                                <input type="submit" value="Enviar" class="input_send">
                                <button class="btn btn-default" v-show="uploadFile != 0" @click.stop.prevent="cancelUpload"><i class="fa fa-close"></i></button>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>
                
                {{-- Conversaciones --}}
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 captionRecordNotas captionAllMessage aldeAdminChat">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 dataShoWmensajes">
                        
                        {{-- FOR --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 FriendWithChat" v-for="(c,i) in chats" :class="{ 'selected': chat.id == c.id }">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 RemoveChatWithUser">
                                <form action="" method="get" accept-charset="utf-8">
                                    <i class="fa fa-times" aria-hidden="true" @click="deleteChat(i)"></i>
                                </form>
                            </div>
                            <a href="" @click.prevent="selectChat(i)">
                                <input type="hidden" name="_token" value="lEgRWkCkDrNuMQ36ujN6a1wK301wPsvf84onT1ZJ">
                                
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 vloqImageUser">
                                <div class="badge badge-primary" v-if="c.notRead > 0">@{{ c.notRead }}</div>
                                    <p class="gasper"></p>
                                    <img class="img-responsive img-circle" :src="c.transmitter.avatar" alt="" v-if="user_id != c.transmitter_id">

                                     <img class="img-responsive img-circle" :src="c.receiver.avatar" alt="" v-else>

                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 blqueDatasUser">
                                    <p class="colorBlack fontMiriamProSemiBold TitleUserMen" v-if="user_id != c.transmitter_id">@{{ c.transmitter.name }} <span> dice: </span></p>
                                    <p class="colorBlack fontMiriamProSemiBold TitleUserMen" v-else> @{{ c.receiver.name }} <span> dice: </span></p>
                                    <p class="cont_previwMenSage">que hay...</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 TimeSendMenssage">
                                </div>
                            </a>
                        </div>
                        {{--END FOR--}}
                         <div class="col-xs-12" v-show="chats.length == 0">
                            <br>
                            <p class="text-center">
                                <small class="text-muted">Sin conversaciones</small>
                            </p>
                        </div>

                    </div>

                    <!-- BLOQUE CALENDAR -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 listConection lineChat">

                        {{-- Usuarios en linea --}}

                        @include('components.users-online')
                       
                        {{-- Todos los usuarios --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatListAllUser">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 SearchSection">
                                <form action="" class="formSearchChat">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input id="filtrar" type="text" class="form-control" >
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                    </div><!-- /.row -->
                                </form>
                            </div>

                            <!--  FILTAR BUISQUEDA  -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 AlluserReegitrados columnChatss">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 AlluserReegitradosPorBloque" v-for="u in users">
                                    <a href="#!" @click="getOrCreate(u.id)">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 vloqImageUser">
                                            <p class="gasper"></p>
                                            <img :src="u.avatar" alt="" class="img-responsive img-circle all-users">
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 blqueDatasUser">
                                            <p class="colorBlack fontMiriamProSemiBold TitleUserMen">@{{ u.name }} @{{ u.lastname }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 datPublich publishChatAdmin">
                            <!-- <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/chatGrupo.png" alt="" data-toggle="modal" data-target="#myModalCHat"> -->
                            <img class="img-responsive" src="{{ asset('assets/images/avatar/addpubliImgae.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                            <img class="img-responsive" src="{{ asset('assets/images/avatar/AnuncioPublicAdmin.png') }}" alt="">
                        </div>


                    </div>

                </div>
            </div>

        </div>

        <!-- Modal -->
    @include('front-end.partials.field-public-post')


    <!-- Modal chat -->
        <div class="modal fade" id="myModalCHat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog contPusblishDialogo" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 continPublish publichChat">
                            <form action="home_submit" method="get" class="sectionPublichUser" accept-charset="utf-8">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionCreateCHat">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 selectActtions max example">
                                        <select name="skills" multiple="" class="ui fluid dropdown">
                                            <option value="">Agregar usuarios +</option>
                                            <option value="angular">Angular</option>
                                            <option value="css">CSS</option>
                                            <option value="design">Graphic Design</option>
                                            <option value="ember">Ember</option>
                                            <option value="html">HTML</option>
                                            <option value="ia">Information Architecture</option>
                                            <option value="javascript">Javascript</option>
                                            <option value="mech">Mechanical Engineering</option>
                                            <option value="meteor">Meteor</option>
                                            <option value="node">NodeJS</option>
                                            <option value="plumbing">Plumbing</option>
                                            <option value="python">Python</option>
                                            <option value="rails">Rails</option>
                                            <option value="react">React</option>
                                            <option value="repair">Kitchen Repair</option>
                                            <option value="ruby">Ruby</option>
                                            <option value="ui">UI Design</option>
                                            <option value="ux">User Experience</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 selectActtions max example">
                                        <select name="skills" multiple="" class="ui fluid dropdown">
                                            <option value="">Agregar por áreas</option>
                                            <option value="angular">Angular</option>
                                            <option value="css">CSS</option>
                                            <option value="design">Graphic Design</option>
                                            <option value="ember">Ember</option>
                                            <option value="html">HTML</option>
                                            <option value="ia">Information Architecture</option>
                                            <option value="javascript">Javascript</option>
                                            <option value="mech">Mechanical Engineering</option>
                                            <option value="meteor">Meteor</option>
                                            <option value="node">NodeJS</option>
                                            <option value="plumbing">Plumbing</option>
                                            <option value="python">Python</option>
                                            <option value="rails">Rails</option>
                                            <option value="react">React</option>
                                            <option value="repair">Kitchen Repair</option>
                                            <option value="ruby">Ruby</option>
                                            <option value="ui">UI Design</option>
                                            <option value="ux">User Experience</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <textarea name="" placeholder="Escribe un comentario"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions">
                                    <div class="col-md-6 actionpuBlish">
                                        <div class="col-md-2 Adjuntar">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                                        </div>
                                        <div class="col-md-2 AdjuntarFoto">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                        </div>
                                        <div class="col-md-2 DestacarPuslish">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/destacarIco.png') }}" alt="">
                                        </div>
                                        <div class="col-md-2 AlertPublish">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/alertIco.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ButtinPublish">
                                        <input type="submit" value="Enviar"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </section>

@endsection

@section('js')
<script src="{{ asset('assets/js/src/chat.js') }}"></script>
<script>
    chat.getUser({{ Auth::user()->id }})
</script>
@endsection
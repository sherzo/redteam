@extends('layouts.public')

@section('content')
    <div class="container continerWithSite contaiNChatU" id="chats" v-cloak>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos captionChat">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatWithUser">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatWithUserDatas">
                        <div class="label dataPrubeIm dataProfileAllUsersListChatSelect recibeSelectChat" style="background-image: url('{{ asset('assets/profiles/67358.png') }}');"></div>
                        <p class="colorBlack fontMiriamProSemiBold">Janixia</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatCOntentUsers">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userCOntentChat chat_box">

                        <div class="col-lg-12 MensaGedate getSenMenIds2" :class="{ 'getUserReceive': m.user_id != user_id, 'getUserSend': m.user_id == user_id  }" v-for="m in messages">
                            <div class="col-lg-12 wrapMensage envMensgaRce2"><p>@{{ m.content }}</p></div>
                        </div>
                        
                        {{-- 
                            <div class="col-lg-12 MensaGedate getUserSend getSenMenIds3">
                                <div class="datafechasND datgde2">17-04-2017</div>
                                <div class="col-lg-12 wrapMensage envMensga3"><p>hola que pasa Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam omnis consectetur enim nesciunt ipsa quos numquam suscipit dolores, porro voluptate officia doloribus sunt libero perspiciatis facere quis, commodi, deserunt nihil!</p></div>
                            </div>

                         --}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatSendUsers">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 userCOntentSend">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 contenTexaArea chat_box">
                            <textarea name="" class="input_message form-control" placeholder="Escribe aquí"></textarea>
                            <input type="hidden" class="input_id_user_logi" value="5"> <form id="formuploadajax" class="chatFIles" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="lEgRWkCkDrNuMQ36ujN6a1wK301wPsvf84onT1ZJ">
                                <div class="contenMoreImages">
                                    <input type="file" class="fileInputImageChat1" name="fileInputImageChat[]">
                                </div>
                            </form>
                            <input type="hidden" class="input_name DatIdUserChat" value="5">

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 contentActionSend chat_box">

                            <div class="anjunFoto">
                                <img class="img-responsive imImgaChat" onclick="chooseFileImageChat1();" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                            </div>
                            <div class="anjunDocu">
                                <img class="img-responsive img1DoChat" onclick="chooseFileDocuChat1()" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="">
                            </div>

                            <input type="submit" value="Enviar" class="input_send">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 captionRecordNotas captionAllMessage">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 dataShoWmensajes">
                    {{-- FOR --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 FriendWithChat" v-for="(c,i) in chats">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 RemoveChatWithUser">
                            <form action="" method="get" accept-charset="utf-8">
                                <i class="fa fa-times" aria-hidden="true" @click="deleteChat(i)"></i>
                            </form>
                        </div>
                        <a href="" @click.prevent="getMessages(c.id)">
                            <input type="hidden" name="_token" value="lEgRWkCkDrNuMQ36ujN6a1wK301wPsvf84onT1ZJ">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 vloqImageUser">
                                <p class="gasper"></p>
                                <div class="label dataPrubeIm dataProfileAllUsersListChat" :style="{ 'background-image': 'url(' + c.transmitter.avatar + ')' }" v-if="user_id != c.transmitter_id"></div>
                                <div class="label dataPrubeIm dataProfileAllUsersListChat" :style="{ 'background-image': 'url(' + c.receiver.avatar + ')' }" v-else></div>
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
                </div>


                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 listConection lineChat">

                    <div class="captionUsersInLive">
                        <div class="ui accordion">
                            <h3 class="fontMiriamProRegular"><span class="estusLive">•</span>En Linea</h3>
                            <div class="title"><div class="captionCircleUser captionDenoews AlluserReegitradosPorBloque"><a href="#!" class="userLive" data-idonline="5" data-iduserchat="5"> <div class="label dataPrubeIm vloqImageUser dataProfileAllUsersOnline styRos5" style="background-image: url({{ asset('assets/profiles/67358.png') }});"> </div></a></div>
                            </div>
                            <div class="content">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChatListAllUser">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 SearchSection">
                            <form action="" class="formSearchChat">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <input id="filtrar" type="text" class="form-control">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </span>
                                        </div><!-- /input-group -->
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                            </form>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 AlluserReegitrados columnChatss">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 AlluserReegitradosPorBloque" v-for="u in users">
                                <a href="#!" @click="addChat(u.id)">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 vloqImageUser">
                                        <p class="gasper"></p>
                                        <div class="label dataPrubeIm dataProfileAllUsersListChat" :style="{ 'background-image': 'url(' + u.avatar + ')' }"></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 blqueDatasUser">
                                        <p class="colorBlack fontMiriamProSemiBold TitleUserMen">@{{ u.name }}</p>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-12 datPublich">
                        <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/IcoPublich.png" alt="asdasd" data-toggle="modal" data-target="#myModal">
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

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
    {{-- Mensajes entrada salida --}}
    @include('front-end.partials.fields-entrada-salida-mensajes')

@endsection

@section('js')
<script src="{{ asset('assets/js/src/chat.js') }}"></script>
<script>
    chat.getUser({{ Auth::user()->id }})
</script>
@endsection
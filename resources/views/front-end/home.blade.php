@extends('layouts.public')

@section('css')
<style>
   
</style>
@endsection
@section('content')
<div id="publications"> 
    <div class="container continerWithSite" v-cloak>
        <div class="row">
            <transition name="fade">
                <p class="alert alert-success" v-show="success != ''">@{{ success }}</p>
            </transition>
            <div class="col-xs-12 col-sm-12 notifisMobile">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right navulRIght">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="icosMenus">
                            <a href="#!">
                                <img src="{{ asset('assets/images/house-ido.png') }}" class="img-responsive" alt="">
                            </a>
                        </li>
                        <div class="ui dropdown dropdownSemantic notifiICos fontMiriamProRegular">
                            <a href="#!">
                                <img src="{{ asset('assets/images/notify-ico.png') }}" class="img-responsive" alt="">
                                <div class="notifiCount">
                                    @include('front-end.partials.fields-Totalnotificaciones')
                                </div>
                            </a>
                            <div class="menu">
                                {{-- _____________________________________________________________

                                                    NOTIFICACIONES
                                     _____________________________________________________________
                                --}}
                                @include('front-end.partials.fields-notificaciones')
                            </div>
                        </div>
                    @endif
                 </ul>
            </div>

            {{-- 
            ___________________________________________________________________________________________
    
                                                INFINY SCROLL
            ___________________________________________________________________________________________
            --}}
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos" v-infinite-scroll="getPublications" infinite-scroll-disabled="busy" infinite-scroll-distance="5">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" >

                    {{--     INICIO DE V-FOR--}}   
                    <div class="col-md-12" v-for="(p, i) in publications" :class="{ 'typeAvisosPost': p.color }" >
                        
                        {{--  Notificaciones de admin si existe color  --}}
                        <div class="ui icon message" v-if="p.color" :style="{ 'background': p.color }">
                            <div class="content">
                                <p class="fontMiriamProRegular">@{{ p.description }} </p>
                            </div>
                        </div>

                        <div v-else>
                            <div class="ui feed uifeedAvatar">
                                <div class="event">
                                    <div class="label dataPrubeIm" :style="{ 'background-image': 'url('+ p.user.avatar + ')' }">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a :href="p.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                @{{ p.user.name }}
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave">
                                                @{{ p.created_at | humanize }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="textCOment fontMiriamProRegular colorGrisMediumSuave">
                                @{{ p.description }}
                            </p>
                            <a :href="p.file" class="dataDpcuCl" download="" v-show="p.file">
                                <img class="img-responsive claa__cupo" src="{{ asset('assets/images/bogIcoDocuments.png') }}" />
                            </a>
                            <img :src="p.image" v-show="p.image" alt="post-user" class="img-responsive"  style="width: 100%;">
                            <div class="ui feed uifeedActions">
                                <div class="event">
                                    <div class="label">
                                        <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                    </div>
                                    <div class="content contLike">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold" @click="like(p)" style="font-size: 13px;">
                                                @{{ p.likes.length }} Likes<span v-show="p.liked">, Te gusta esta publicacicón</span>
                                            </a>
                                            <div class="date datePint fontMiriamProRegular colorGrisMediumSuave" v-show="p.featured">
                                                <img class="img-responsive" src="{{ asset('assets/images/pines-ico.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="ui feed uifeedComnetUser" v-if="p.comments.length > 0">
                                <div class="event" v-for="c in p.comments">
                                    <div class="label dataPrubeIm" :style="{ 'background-image': 'url(' + c.user.avatar + ')' }">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a :href="c.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                @{{ c.user.name }}
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                @{{ c.description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="ui form formComentUser" @submit.prevent="addComment(p.id, i, 'publications')">
                                <div class="field">
                                    <textarea name="comentario_post"  placeholder="Comentario" required v-model="p.comment"></textarea>
                                </div>
                                <a href="" class="dataComenyt" @click.prevent="addComment(p.id, i, 'publications')"><p>Comentar</p></a>
                            </form>
                        </div>
                    </div>
                    {{--    FIN DE V-FOR 

                    --}}
                </div>    
            
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    {{--     INICIO DE V-FOR TWO --}}   
                    <div class="col-md-12" v-for="(p, i) in publicationsTwo" :class="{ 'typeAvisosPost': p.color }" >
                        
                        {{--  Notificaciones de admin si existe color  --}}
                        <div class="ui icon message" v-if="p.color" :style="{ 'background': p.color }">
                            <div class="content">
                                <p class="fontMiriamProRegular">@{{ p.description }} </p>
                            </div>
                        </div>

                        <div v-else>
                            <div class="ui feed uifeedAvatar">
                                <div class="event">
                                    <div class="label dataPrubeIm" :style="{ 'background-image': 'url('+ p.user.avatar + ')' }">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a :href="p.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                @{{ p.user.name }}
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave">
                                                @{{ p.created_at | humanize }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="textCOment fontMiriamProRegular colorGrisMediumSuave">
                                @{{ p.description }}
                            </p>
                            <a href="" class="dataDpcuCl" :download="p.file" v-show="p.file">
                                <img class="img-responsive claa__cupo" src="{{ asset('assets/images/bogIcoDocuments.png') }}" />
                            </a>
                            <img :src="p.image" v-show="p.image" alt="post-user" style="width: 100%;" class="img-responsive">
                            <div class="ui feed uifeedActions">
                                <div class="event">
                                    <div class="label">
                                        <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                    </div>
                                    <div class="content contLike">
                                        <div class="summary">
                                            <a class="user colorGrisMediumSuave fontMiriamProSemiBold" @click="like(p)" style="font-size: 13px;">
                                                @{{ p.likes.length }} Likes<span v-show="p.liked">, Te gusta esta publicacicón</span>
                                            </a>
                                            <div class="date datePint fontMiriamProRegular colorGrisMediumSuave" v-show="p.featured">
                                                <img class="img-responsive" src="{{ asset('assets/images/pines-ico.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="ui feed uifeedComnetUser" v-if="p.comments.length > 0">
                                <div class="event" v-for="c in p.comments">
                                    <div class="label dataPrubeIm" :style="{ 'background-image': 'url(' + c.user.avatar + ')' }">
                                    </div>
                                    <div class="content">
                                        <div class="summary">
                                            <a :href="c.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                @{{ c.user.name }}
                                            </a>
                                            <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                @{{ c.description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="ui form formComentUser" @submit.prevent="addComment(p.id, i, 'publicationsTwo')">
                                <div class="field">
                                    <textarea name="comentario_post"  placeholder="Comentario" required v-model="p.comment"></textarea>
                                </div>
                                <a href="" class="dataComenyt" @click.prevent="addComment(p.id, i, 'publicationsTwo')"><p>Comentar</p></a>
                            </form>
                        </div>
                    </div>
                    {{--    FIN DE V-FOR --}}
                </div>
            </div>
            {{-- _________________________________ END INFINY SCROLL _______________________________________ --}}


            {{-- ___________________________________________________________________________________________ 

                                                  RECORDATORIOS
                ____________________________________________________________________________________________ --}}
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 captionRecordNotas">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bloqueRecordatorios">
                    <h1 class="fontMiriamProRegular">Recordatorios</h1>
                    <div class="captionAvisos">
                        <h1 class="fontMiriamProSemiBold">Avisos</h1>
                        <p class="fontMiriamProRegular">Oportunidad de empleo para asesores. Interesados contactarse con Lic. Marta Hercúles</p>
                    </div>
                    <div class="captionPromos">
                        <p class="fontMiriamProSemiBold">Promociones de hoy</p>                            
                        @foreach($promotions as $promotion)
                            <img class="img-responsive" src="{{ $promotion->image }}">
                        @endforeach
                    </div>
                    
                    {{-- ___________________________________________________________________________________________ 

                                                  POST PERSONALIZADOS
                        ____________________________________________________________________________________________ --}}
                    <div class="captionPostGuardadosText">
                        <p class="fontMiriamProRegular">Post personalizados</p>
                    </div>
                    <div class="">
                        <div v-for="(p, i) in personals" :class="{ 'typeAvisosPost': p.color }" class="personal-post col-md-12">
                            {{--  Notificaciones de admin si existe color  --}}
                            <div>
                                <div class="ui icon message" v-if="p.color" :style="{ 'background': p.color }">
                                    <div class="content">
                                        <p class="fontMiriamProRegular">@{{ p.description }} </p>
                                    </div>
                                </div>

                                <div v-else>
                                <div class="ui feed uifeedAvatar">
                                    <div class="event">
                                        <div class="label dataPrubeIm" :style="{ 'background-image': 'url('+ p.user.avatar + ')' }">
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a :href="p.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    @{{ p.user.name }}
                                                </a>
                                                <div class="date fontMiriamProRegular colorGrisMediumSuave">
                                                    @{{ p.created_at | humanize }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="textCOment fontMiriamProRegular colorGrisMediumSuave">
                                    @{{ p.description }}
                                </p>
                                <a href="" class="dataDpcuCl" :download="p.file" v-show="p.file">
                                    <img class="img-responsive claa__cupo" src="{{ asset('assets/images/bogIcoDocuments.png') }}" />
                                </a>
                                <img :src="p.image" v-show="p.image" alt="post-user" style="width: 100%;" class="img-responsive">
                                <div class="ui feed uifeedActions">
                                    <div class="event">
                                        <div class="label">
                                            <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                        </div>
                                        <div class="content contLike">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold" @click="like(p)" style="font-size: 13px;">
                                                    @{{ p.likes.length }} Likes<span v-show="p.liked">, Te gusta esta publicacicón</span>
                                                </a>
                                                <div class="date datePint fontMiriamProRegular colorGrisMediumSuave" v-show="p.featured">
                                                    <img class="img-responsive" src="{{ asset('assets/images/pines-ico.png') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="ui feed uifeedComnetUser" v-if="p.comments.length > 0">
                                    <div class="event" v-for="c in p.comments">
                                        <div class="label dataPrubeIm" :style="{ 'background-image': 'url(' + c.user.avatar + ')' }">
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a :href="c.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    @{{ c.user.name }}
                                                </a>
                                                <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                    @{{ c.description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="ui form formComentUser" @submit.prevent="addComment(p.id, i, 'personals')">
                                    <div class="field">
                                        <textarea name="comentario_post"  placeholder="Comentario" required v-model="p.comment"></textarea>
                                    </div>
                                    <a href="" class="dataComenyt" @click.prevent="addComment(p.id, i, 'personals')"><p>Comentar</p></a>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                {{-- 
                    ___________________________________________________________________________________________ 

                                                 END POST PERSONALIZADOS
                    ____________________________________________________________________________________________ 
                --}}

                </div>

                {{-- BLOQUE CALENDAR --}}
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="captionCalendar">
                        <div class="dayMonth">
                            <p class="fontMiriamProSemiBold">Agenda</p>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData">
                                <p class="DayAgenda">Jueves</p>
                                <p class="DayNumberAgenda">{{ now()->format('d') }}</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 fechaData fechType">
                                <p class="typEEvento">
                                    @if($today != null)
                                        {{ $today->title }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        @include('components.calendar')
                       
                    </div>

                    {{-- SECTION ADD EVENT CALENDAR --}}

                    <div class="captionAddEvento">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#profile" class="fontMiriamProRegular" aria-controls="profile" role="tab" data-toggle="tab">Agregar evento a calendario</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabconteAddComent">
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <form action="" @submit.prevent="addEvent">
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Escribe el evento" v-model="title"></textarea>
                                    <div id='sandbox-container'>
                                        <div class="input-daterange input-group" id="datepicker">
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                                <input type="text" class="input-sm form-control" name="fecha-start" id="day"/>
                                            </div>
                                        </div>
                                        <h4 class="colorGrisMediumSuave fontMiriamProRegular">Seleccionar fecha</h4>
                                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 captioNFehcFina">
                                            <input type="submit" class="form-control Submit" name="end"  value='Aceptar'/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{--
                    ________________________________________________________________________ 

                                                RANKING 
                    _________________________________________________________________________ 
                    --}}
    
                    <div class="captionRankingUser">
                        <h3 class="fontMiriamProSemiBold">Ranking de empleados</h3>
                        <div id="carousel-example-genericRan" class="carousel slide" data-ride="carousel" data-interval="false">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-genericRan" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-genericRan" data-slide-to="1"></li>
                                <li data-target="#carousel-example-genericRan" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @foreach($ranking as $key => $user)
                                    @if($key == 0)
                                        <div class="item active">
                                    @endif
                                    <div class="col-md-6">
                                        <a href="{{ url('profile/' . $user->username) }}">
                                            <div class="label dataPrubeIm dataimgRabksH" style="background-image: url('{{ $user->avatar }}')">
                                            </div>
                                            <p class="fontMiriamProSemiBold">{{ $user->full_name }}</p>
                                            <div class="ui star rating" data-rating="{{ $user->stars }}"></div>
                                        </a>
                                    </div>
                                    @if($key % 3 == 0 && $key != 0)
                                        @if($ranking->count() != $key+1)
                                        </div>
                                        <div class="item">
                                        @endif
                                    @endif
                                @endforeach
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control carouselRank" href="#carousel-example-genericRan" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control carouselRank" href="#carousel-example-genericRan" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                        <div class="col-md-12 capInteRankingSube">
                            <a href="ranking-empleados">
                                <h2 class="fontCovered">¡Sube de Ranking!</h2>
                            </a>
                        </div>
                    </div>


                    {{--
                    ________________________________________________________________________ 

                                                USERS ONLINE 
                    _________________________________________________________________________ 
                    --}}
                    @include('components.users-online-external')
                    
                    {{--
                    ________________________________________________________________________ 

                                                RECENT ACTIVITIES 
                    _________________________________________________________________________ 
                    --}}
                    <div class="captionActivitiesRecientes">
                        <h3 class="fontMiriamProSemiBold">Actividades recientes</h3>
                        <div class="notficiActivitie">
                            <div class="ui relaxed divided list">
                                @foreach($recents as $recent)
                                <div class="item {{ $recent->class }}">
                                    <i class="large github middle aligned {{ $recent->icon }}"></i>

                                    <div class="content">
                                        <a class="header">{!! $recent->data !!}</a>
                                    </div>
                                </div> 
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    {{--
                    ________________________________________________________________________ 

                                                GALERY
                    _________________________________________________________________________ 
                    --}}
                    

                </div>

            </div>
            {{-- _________________________________END RECORDATORIOS ________________________________________ --}}
        </div>
        
        {{--__________________________________________________________________________________________________
        
                                                    BOTON MODAL
            __________________________________________________________________________________________________
        --}} 
        <div class="col-md-12 datPublich">
            <img class="img-responsive" src="{{ asset('assets/images/avatar/IcoPublich.png') }}" alt="" data-toggle="modal" data-target="#myModal">
        </div>

        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog contPusblishDialogo" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                            <form class="sectionPublichUser" accept-charset="utf-8" @submit.prevent="addPublication" enctype="multipart/form-data">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <textarea name="" required="" v-model="description" placeholder="Escribe un comentario"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions">
                                    <div class="col-md-6 actionpuBlish">
                                        
                                        <div class="col-md-2 Adjuntar">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="" onclick="document.getElementById('fileInput').click()">
                                            <input type="file" id="fileInput" ref="myFile" style="display: none" @change="getFile">
                                            
                                            <div v-show="file.name" style="height: 5px; background-color: #39b54a;"></div>
                                        </div>

                                        <div class="col-md-2 AdjuntarFoto" onclick="document.getElementById('imageInput').click()">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                            <input type="file" id="imageInput" ref="myImage" style="display: none" @change="getImage">
                                            
                                            <div v-show="image.name" style="height: 5px; background-color: #39b54a;"></div>
                                        </div>
                                        
                                        <div class="col-md-2 DestacarPuslish" @click="selectFeatured" >
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/destacarIco.png') }}" alt="">
                                            
                                        </div>
                                        <div class="col-md-2 AlertPublish" @click="selectEmergency">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/alertIco.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ButtinPublish">
                                        <input type="submit" value="Enviar">
                                        <button type="button" class="btn btn-default close-modal hide" data-dismiss="modal" id="close-modal">Close</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
</div>
@endsection

@section('js')
{{--
--}}
<!-- BS JavaScript -->
{{--

    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
    --}} 
<script src="{{ asset('assets/js/src/publication.js') }}"></script>
<script>
    publication.getUser({{Auth::user()->id}})
</script>
@endsection
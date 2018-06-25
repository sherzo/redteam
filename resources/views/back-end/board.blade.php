@extends('layouts.admin')

@section('css')
<style>
  [v-cloak] > * {
    display: none;
  }
</style>
@endsection

@section('content')

{{-- SECTION MENU INTERNO HOME --}}
<section class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMenuInterno menuInernoBoard">
        <ul>
            <li><a href="{{ url('admin/home') }}">Home</a></li>
            <li class="active"><a href="{{ url('admin/home') }}">Board</a></li>
            <li><a href="{{ url('admin/users') }}">Usuarios</a></li>
        </ul>
    </div>
</section>
<section class="container-fluid containernavNotifis">
    <nav class="navbar navbar-default navbar-static-top navbarHome BgYellow">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
            </div>

            <div class="collapse navbar-collapse collapseMenuUser" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <img class="paletaAdminBoard" src="{{ asset('assets/images/ico-paleta.png') }}" alt="Paleta-Colores">
                <ul class="centerNameUserMenu">
                    <li class="colorBlack fontMiriamProRegular">¡Hola! {{ Auth::user()->name }}</li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right navulRIght">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="icosMenus">
                        <a href="#!">
                            <img src="{{ asset('assets/images/avatar/homeNotifiAdmin.png') }}" class="img-responsive" alt="">
                        </a>
                    </li>
                    <div class="ui dropdown dropdownSemantic notifiICos fontMiriamProRegular">
                        <a href="#!">
                            <img src="{{ asset('assets/images/avatar/campaniNotifiAdmin.png') }}" class="img-responsive" alt="">
                            <div class="notifiCount">
                                @include('back-end.partials.fields-history-notificaciones-cantidad')
                            </div>
                        </a>
                        <div class="menu">
                            @include('back-end.partials.fields-history-notificaciones-board')
                        </div>
                    </div>
                    <li class="dropdown uSerLogue colorBlackSuave fontMiriamProRegular">
                        <a href="#" class="dropdown-toggle colorBlackSuave" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</section>

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
                    @include('back-end.partials.fields-history-notificaciones-cantidad')
                </div>
            </a>
            <div class="menu">
                @include('back-end.partials.fields-history-notificaciones-board')
            </div>
        </div>
        @endif
    </ul>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 captionRecientesMobie">
    @include('back-end.partials.fields-history-notificaciones-board')
</div>


<!-- SECTION BLOQUE NOTIFICACION Y MENSAJES  -->
<section class="container-fluid sectionAdminNotifiMensa sectionPostDats" id="publications">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" v-cloak>
        <p class="alert alert-success" v-show="success">Evento creado con exitos</p>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionBoard">
            <div class="container continerWithSite">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            
                            {{--     INICIO DE V-FOR--}}           
                            <div class="col-md-12" v-for="(p, i) in publications" :class="{ 'typeAvisosPost': p.color }">
                                <div class="ui icon message" v-if="p.color" :style="{ 'background': p.color }">
                                    <img class="img-responsive" src="{{ asset('assets/images/ico-oportunidades.png') }}">
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
                                <img :src="p.image" v-show="p.image" alt="post-user" class="img-responsive">
                                <div class="ui feed uifeedActions">
                                    <div class="event">
                                        <div class="label">
                                            <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                        </div>
                                        <div class="content contLike">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold" @click="like(p)">
                                                    @{{ p.likes.length }} Likes <p v-show="p.isLiked">Te gusta esta publicaión</p>
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
                                                <a :href="p.user.username | profileUrl" class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    @{{ c.user.name }}
                                                </a>
                                                <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                    @{{ c.description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="ui form formComentUser" @submit.prevent="addComment(p.id, i)">
                                    <div class="field">
                                        <textarea name="comentario_post"  placeholder="Comentario" required v-model="p.comment"></textarea>
                                    </div>
                                    <a href="" class="dataComenyt" @click.prevent="addComment(p.id, i)"><p>Comentar</p></a>
                                </form>
                                </div> {{-- V-ELSE --}}  
                            </div>
                            {{--    FIN DE V-FOR --}}
                        </div>

                        <!-- BLOQUE LATERAL -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="col-md-12 typeAvisosPost">
                                <div class="ui icon message">
                                    <img class="img-responsive" src="{{ asset('assets/images/ico-oportunidades.png') }}">
                                    <div class="content">
                                        <p class="fontMiriamProRegular">Oportunidades de empleo, pagos, inicio de proyectos, apertura de sucursales, </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 typeEventCumpleanos">
                                <a href="" class="removeComent">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                <div class="bgHappy">
                                    <img class="img-responsive PeopleHappy" src="{{ asset('assets/images/profile-user-circle.png') }}">
                                </div>
                                <h4 class="fontCovered">¡Feliz cumpleaños Miriam!</h4>
                                <h5 class="fontMiriamProRegular">Te desea Valdez Mobile</h5>
                                <div class="ui feed uifeedActions">
                                    <div class="event">
                                        <div class="label">
                                            <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                        </div>
                                        <div class="content contLike">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    45 Likes
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui feed uifeedComnetUser">
                                    <div class="event">
                                        <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    Leonardo
                                                </a>
                                                <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                    Hey que genial por fin se vienen las vaciones. Vamos todos a la playa!!
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="removeComent">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <form class="ui form formComentUser">
                                    <div class="field">
                                        <textarea name="comentario_post"  placeholder="Comentario" required></textarea>
                                        <input type="hidden" class="iduserComent" name="coment_action_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" class="idDataPost" name="data_id_post" value="">
                                    </div>
                                    <a href="" class="dataComenyt"><p>Comentar</p></a>
                                </form>
                            </div>

                            <div class="col-md-12">
                                <div class="ui feed uifeedAvatar">
                                    <div class="event">
                                        <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    Leonardo
                                                </a>
                                                <div class="date fontMiriamProRegular colorGrisMediumSuave">
                                                    1 Hour
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-responsive" src="{{ asset('assets/images/bg-post.jpg') }}" alt="post-user">
                                <div class="ui feed uifeedActions">
                                    <div class="event">
                                        <div class="label">
                                            <img class="img-responsive" src="{{ asset('assets/images/etiqueta-ico.png') }}">
                                        </div>
                                        <div class="content contLike">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    45 Likes
                                                </a>
                                                <div class="date datePint fontMiriamProRegular colorGrisMediumSuave">
                                                    <img class="img-responsive" src="{{ asset('assets/images/pines-ico.png') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ui feed uifeedComnetUser">
                                    <div class="event">
                                        <div class="label dataPrubeIm" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')">
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                <a class="user colorGrisMediumSuave fontMiriamProSemiBold">
                                                    Leonardo
                                                </a>
                                                <div class="date fontMiriamProRegular colorGrisMediumSuave comentUser">
                                                    Awww que bonito
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="ui form formComentUser">
                                    <div class="field">
                                        <textarea name="comentario_post"  placeholder="Comentario" required></textarea>
                                        <input type="hidden" class="iduserComent" name="coment_action_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" class="idDataPost" name="data_id_post" value="">
                                    </div>
                                    <a href="" class="dataComenyt"><p>Comentar</p></a>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 captionRecordNotas">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bloqueRecordatorios">
                            <h1 class="fontMiriamProRegular">Recordatorios</h1>
                            <div class="captionAvisos">
                                <h1 class="fontMiriamProSemiBold">Avisos</h1>
                                <p class="fontMiriamProRegular">Oportunidad de empleo para asesores. Interesados contactarse con Lic. Marta Hercúles</p>
                            </div>
                           {{--

                            <div class="captionPromos">
                                <p class="fontMiriamProSemiBold">Promociones de hoy</p>
                                <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/promo-public.jpg">
                                <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/promo-public.jpg">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionPublichIcos publichBoard">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/AnuncioPublicAdmin.png" alt="">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <img class="img-responsive" src="http://app-7983e06f-f506-428d-aef9-aea82667c6d7.cleverapps.io/public/assets/images/avatar/addpubliImgae.png" alt="" data-toggle="modal" data-target="#myModal">
                                </div>
                            </div>
                            --}} 

                        </div>


                       <div class="col-md-12 datPublich">
                        <img class="img-responsive" src="{{ asset('assets/images/avatar/IcoPublich.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                    </div>
                    </div>
                </div>

            </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog contPusblishDialogo" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 continPublish">
                            <form class="sectionPublichUser" accept-charset="utf-8" @submit.prevent="addPublication" enctype="multipart/form-data">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <textarea name="" v-model="description" placeholder="Escribe un comentario"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 bloquesActions">
                                    <div class="col-md-6 actionpuBlish">
                                        
                                        <div class="col-md-2 Adjuntar">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarIco.png') }}" alt="" onclick="document.getElementById('fileInput').click()">
                                            <input type="file" id="fileInput" ref="myFile" style="display: none" @change="getFile">
                                        </div>

                                        <div class="col-md-2 AdjuntarFoto" onclick="document.getElementById('imageInput').click()">
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/adjuntarFoto.png') }}" alt="">
                                            <input type="file" id="imageInput" ref="myImage" style="display: none" @change="getImage">
                                        </div>
                                        
                                        <div class="col-md-2 DestacarPuslish" @click="selectFeatured" >
                                            <img class="img-responsive" src="{{ asset('assets/images/avatar/destacarIco.png') }}" alt="">
                                        </div>
                                        <div class="col-md-2 AlertPublish" @click="selectEmergency">
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
        </div>

    </div>

    </div>
</section>

<div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
@endsection

@section('js')
     <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
    <!-- BS JavaScript -->
    <script src="{{ asset('assets/js/src/publication.js') }}"></script>
    <script>
        publication.getUser({{Auth::user()->id}})
    </script>
@endsection
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
                        <a href="{{ url('admin/home') }}">
                            <img src="{{ asset('assets/images/avatar/homeNotifiAdmin.png') }}" class="img-responsive" alt="">
                        </a>
                    </li>
                    <div class="ui dropdown dropdownSemantic notifiICos fontMiriamProRegular" :class="{'active visible': toggle }" id="notifications" v-cloak>
                        <a href="#!" @click.prevent.stop="showNotifications">
                            <img src="{{ asset('assets/images/avatar/campaniNotifiAdmin.png') }}" class="img-responsive" alt="">
                            <div class="notifiCount">
                                <p class="gasper">0</p>
                                 <p>@{{ unRead }}</p>
                                {{--@include('back-end.partials.fields-history-notificaciones-cantidad')--}}
                            </div>
                        </a>
                        <div :class="clases" :style="{ 'display': display }" style="min-width: 250px;">
                            @include('components.notifications')
                        </div>
                        {{--<div class="menu">
                            @include('back-end.partials.fields-history-notificaciones-board')
                        </div>--}}
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
                    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 captionPosteos"  v-infinite-scroll="getPublications" infinite-scroll-disabled="busy" infinite-scroll-distance="5">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            
                            {{--     INICIO DE V-FOR--}}           
                            <div class="col-md-12" v-for="(p, i) in publications" :class="{ 'typeAvisosPost': p.color }">
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
                                <img :src="p.image" v-show="p.image" alt="post-user" class="img-responsive" style="width: 100%;">
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
                                    <a href="" class="dataComenyt" @click.prevent="addComment(p.id, i, 'publications')"><p>Comentar</p></a>
                                </form>
                                </div> {{-- V-ELSE --}}  
                            </div>
                            {{--    FIN DE V-FOR --}}
                        </div>

                            <!-- Segundo V-FOR -->
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                {{--     INICIO DE V-FOR--}}           
                                <div class="col-md-12" v-for="(p, i) in publicationsTwo" :class="{ 'typeAvisosPost': p.color }">
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
                                    <img :src="p.image" v-show="p.image" alt="post-user" class="img-responsive" style="width: 100%;">
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
                                        <a href="" class="dataComenyt" @click.prevent="addComment(p.id, i, 'publicationsTwo')"><p>Comentar</p></a>
                                    </form>
                                    </div> {{-- V-ELSE --}}  
                                </div>
                                {{--    FIN DE V-FOR --}}
                            </div>
                            <!-- FIN Segundo V-FOR -->

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 captionRecordNotas">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 bloqueRecordatorios">
                            <h1 class="fontMiriamProRegular">Recordatorios</h1>
                            <div class="captionAvisos">
                                <h1 class="fontMiriamProSemiBold">Avisos</h1>
                                <p class="fontMiriamProRegular">Oportunidad de empleo para asesores. Interesados contactarse con Lic. Marta Hercúles</p>
                            </div>
                        </div>

                       <div class="col-md-12 datPublich">
                        <img class="img-responsive" src="{{ asset('assets/images/avatar/IcoPublich.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                    </div>
                    </div>
                </div>

            </div>
    
        @include('components.publication')
        {{--

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
            --}}
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
    <script src="{{ asset('assets/js/src/notification.js') }}"></script>
@endsection
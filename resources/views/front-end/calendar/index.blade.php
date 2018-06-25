@extends('layouts.public')

@section('css')
<style>
    .dataDays {
        margin-top: 10px;
    }
    .carousel-control {
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
    <div class="container continerWithSite contCalnedar" id="calendar" v-cloak>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mesCalendars">

                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 DaysCalendars">
                    <!-- BLOQUE CALENDAR -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="captionCalendar">
                            <div class="dayMonth">
                                <p class="fontMiriamProSemiBold dyaGeneralClanedar">{{ now()->format('l') }}</p>
                                <h1 class="DayNumberAgenda">{{ now()->format('d') }}</h1>
                            </div>
                        </div>

                        <!-- SECTION ADD EVENT CALENDAR -->

                        <div class="captionAddEvento addEventeGenral">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile" class="fontMiriamProRegular" aria-controls="profile" role="tab" data-toggle="tab">Agregar evento a calendario</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabconteAddComent">
                                <div role="tabpanel" class="tab-pane fade active in" id="profile">
                                    <form action="postCreateEvento" method="post" @submit.prevent="addEvent">
                                        <textarea cols="30" v-model="title" rows="10" name="evento_descript" placeholder="Escribe el evento" required=""></textarea >
                                        <div id="sandbox-container">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                                    <input type="text" class="input-sm form-control" name="fecha_start_evento" required="" id="day">
                                                </div>
                                            </div>
                                            <h4 class="colorGrisMediumSuave fontMiriamProRegular">Seleccionar fecha</h4>
                                            <input type="hidden" name="id_user_evento" value="5">
                                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 captioNFehcFina">
                                                <input type="submit" class="form-control Submit" value="Aceptar">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 CarouselDataCalendar">
                    
                    @include('components.calendar')
                    
                </div>
            </div>

            <!-- calendario carousel -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 EventsCalendars">
                
                @include('components.events')
            
            </div>
        </div>

    </div>

    {{-- Mensajes entrada salida --}}
    @include('front-end.partials.fields-entrada-salida-mensajes')
@endsection

@section('js')
    <script src="{{ asset('assets/js/src/calendar.js') }}"></script>
@endsection

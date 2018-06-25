@extends('layouts.admin')

@section('content')
    
    @include('components.header-admin', [
        'title' => 'Calendario',
        'placeholder' => 'Buscar solicitud por nombre de usuario'
    ])

    <!-- content calendario -->
    <section class="container-fluid sectionAdminNotifiMensa containSugerencias containCalendare" id="calendar" v-cloak>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mesCalendars mesCalendarAdmin">
                
                {{--ADD ENVENT --}}
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 DaysCalendars">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="captionCalendar">
                            <div class="dayMonth">
                                <p class="gasper">2018-04-11 20:32:24</p>
                                <p class="gasper">Wednesday</p>
                                <p class="gasper">04</p>
                                <p class="gasper">11</p>
                                <p class="fontMiriamProSemiBold dyaGeneralClanedar">Wednesday</p>
                                <h1 class="DayNumberAgenda">11</h1>
                            </div>
                        </div>
                        <div class="captionAddEvento addEventeGenral">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile" class="fontMiriamProRegular" aria-controls="profile" role="tab" data-toggle="tab">Agregar evento a calendario</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabconteAddComent addComentCalendarAdmins">
                                <div role="tabpanel" class="tab-pane fade active in" id="profile">
                                    <form @submit.prevent="addEvent" >
                                        <input type="hidden" name="_token" value="QXCD2lFmg3ebW8GthkKPl3LNnP1LaYThskx3GrHt">
                                        <textarea cols="30" rows="10" name="evento_descript" placeholder="Escribe el evento" required="" v-model="title"></textarea>
                                        <div id="sandbox-container">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 captioNFehcIni">
                                                    <input type="text" class="input-sm form-control" name="fecha_start_evento" required="" id="day">
                                                </div>
                                            </div>
                                            <h4 class="colorGrisMediumSuave fontMiriamProRegular">Seleccionar fecha</h4>
                                            <input type="hidden" name="id_user_evento" value="1">
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
                {{-- END ADD EVENT --}}

                {{-- CALENDAR --}}
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 CarouselDataCalendar">
                    @include('components.calendar')
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 EventsCalendars evenCalendarAdmin">
                @include('components.events')
            </div>
        </div>

    </section>
{{--

    @include('back-end.calendar.partials.calendar')
    --}}

    <!-- Modal -->
    @include('front-end.partials.field-public-post')

    <!-- Modal NOTIFICACIONES -->
    @include('back-end.partials.fields-modal-notificaciones')

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
    
@endsection

@section('js')
    <script src="{{ asset('assets/js/src/calendar.js') }}"></script>
@endsection
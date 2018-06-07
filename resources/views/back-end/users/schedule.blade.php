@extends('layouts.admin')

@section('content')

    @include('components.header-admin', [
        'title' => 'Editar horarios',
        'placeholder' => 'Buscar por nombre de usuario'
    ])

    {{-- SECTION BLOQUE NOTIFICACION Y MENSAJES --}}
    <section class="container-fluid sectionAdminNotifiMensa" id="schedule">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            {{--<p class="alert alert-success">Los datos del usuario se han actualizado</p>
            --}}
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">
                 @foreach($users as $usr)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">

                        <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url({{ $usr->avatar }})">
                            
                        </div>
                        <a href="{{ route('users.schedule', $usr->id) }}">
                            <p class="fontMiriamProSemiBold">{{ $usr->full_name }}</p>
                        </a>
                    </div>
                @endforeach


            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser">
               	{{ Form::open(['route' => 'update.schedule']) }}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
                        <h3 class="editAs">Editar a</h3>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataImgAndranking">
                            <input type="hidden" class="idUserEdits" value="2">
                            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 imgProfiEdit">
                                <div class="label dataPrubeIm dataProfileEditUsers" style="background-image: url('{{ $user->avatar }}')"></div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 editRankinFoto">
                                <h3>{{ $user->full_name }}</h3>
                                <div class="contEditDatRanking">


                                    <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclock">
                        <h4>Horario</h3>
                        <h4>Días completos</h4>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallDiasCompleto dayCOmpleTop" v-for="(c, index) in completes">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos bloOONes block1Edit" >
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" :value="c.entry">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataSalida">
                                    <div class="form-group">
                                        <h4>Salida</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" :value="c.exit">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="form-group formSelectDays formseledDiasCOmple">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                        <p class="gasper">2</p>
                                        <h4 class="repetah4">Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueDayss">
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[0] }" 
                                                @click="select(index, 0)">d</div>
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[1] }"
                                                @click="select(index, 1)">l</div>
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[2] }" 
                                                @click="select(index, 2)">m</div>
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[3] }"
                                                @click="select(index, 3)">m</div>
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[4] }"
                                                @click="select(index, 4)">j</div>
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[5] }"
                                                @click="select(index, 5)">v</div>
                                            <div class="DayForDayEdit domin" 
                                                :class="{ DaySelectActiveEdit: c.daysSelected[6] }" 
                                                @click="select(index, 6)">s</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submitEditU">
                        <input type="submit" value="Aceptar">
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

@endsection
@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/clock/bootstrap-clockpicker.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/src/schedule.js') }}"></script>
<script>
schedule.getUser({{ $user->id }})
</script>

{{--
<script src="{{ asset('assets/js/admin/main_horarios.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/admin/main_horarios_edit.js') }}" type="text/javascript"></script>

--}}
@endsection
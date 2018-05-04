@extends('layouts.Template-admin-edit-users')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>Editar usuario</h1>
                @include('back-end.partials.fields-name-admin-login')
                @include('back-end.partials.fields-search-usuarios')

            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <ul class="nav navbar-nav navbar-right navulRIght">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>


    {{-- SECTION BLOQUE NOTIFICACION Y MENSAJES --}}
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser">
                <form action="SaveEdit" method="post" accept-charset="utf-8" class="formEditUser formSaveEditGruop">
                    <input type="hidden" name="_token" value="iLeOZMsjyuuftwBihUi51iEZEtDmQqJ4Y7iGWShK">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
                        <h3 class="editAs">Editar todos los usuarios</h3>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataImgAndranking datarankingGropu">
                            <p class="gasper">0</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Departamento al que pertenece</label>
                                <select name="data_departamento_edit">
                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Técnicos">Técnicos</option>
                                    <option value="Ventas Valdez Mobile Merliot">Ventas Valdez Mobile Merliot</option>
                                    <option value="Bodega">Bodega</option>
                                    <option value="Preventa">Preventa</option>
                                    <option value="Contabilidad">Contabilidad</option>
                                    <option value="Seguridad">Seguridad</option>
                                    <option value="Gerencia">Gerencia</option>
                                    <option value="Creativos">Creativos</option>
                                    <option value="Diseno">Diseno</option>
                                    <option value="Developers">Developers</option>
                                    <option value="Ventas Valdez Mobile Escalón">Ventas Valdez Mobile Escalón</option>
                                    <option value="Ventas Valdez Mobile San Miguel">Ventas Valdez Mobile San Miguel</option>
                                    <option value="Ventas Laptops Valdez Merliot">Ventas Laptops Valdez Merliot</option>
                                    <option value="Ventas Laptops Valdez Escalon">Ventas Laptops Valdez Escalon</option>
                                    <option value="Técnicos Escalón">Técnicos Escalón</option>
                                    <option value="Técnicos Merliot">Técnicos Merliot</option>
                                    <option value="Técnicos San Miguel">Técnicos San Miguel</option>
                                    <option value="Gerencia Ventas">Gerencia Ventas</option>
                                    <option value="Supervisor Merliot VM">Supervisor Merliot VM</option>
                                    <option value="Supervisor Escalón VM">Supervisor Escalón VM</option>
                                    <option value="Supervisor San Miguel VM">Supervisor San Miguel VM</option>
                                    <option value="Supervisor San Miguel LV">Supervisor San Miguel LV</option>
                                    <option value="Supervisor Merliot LV">Supervisor Merliot LV</option>
                                    <option value="Supervisor Escalón LV">Supervisor Escalón LV</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Cargo</label>
                                <input type="text" name="data_cargo_edit">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Jefe Inmediato</label>
                                <select name="data_jefe_edit">
                                    <option value="2">Administrador --</option>
                                    <option value="3">Jessica Ramirez</option>
                                    <option value="4">Francisca De Flores</option>
                                    <option value="5">Janixia Palacios</option>
                                    <option value="6">Alicia Ortíz</option>
                                    <option value="7">Julio Durán</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales dataInformationPersonal">
                            <h3>Información personal</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Género</label>
                                <select name="data_genero_edit">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Estado civil</label>
                                <input type="text" name="data_estado_civil_edit">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclock">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallDiasCompleto">
                            <h3>Horario</h3>
                            <h4>Días completos</h4>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos bloOONes">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="">
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
                                                <input type="text" class="form-control" value="">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                    <div class="form-group formSelectDays formseledDiasCOmple">
                                        <h4>Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDay domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDay lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDay marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDay mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDay jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDay vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDay saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos block2">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="">
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
                                                <input type="text" class="form-control" value="">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                    <div class="form-group formSelectDays formseledDiasCOmple">
                                        <h4>Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDay domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDay lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDay marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDay mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDay jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDay vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDay saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos block3">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="">
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
                                                <input type="text" class="form-control" value="">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                    <div class="form-group formSelectDays formseledDiasCOmple">
                                        <h4>Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDay domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDay lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDay marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDay mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDay jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDay vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDay saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#!" class="newHorario">
                                <p>Agregar nuevo Horario</p>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallMedioDia">
                            <h4>Medio día</h4>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos blockMedio1">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="">
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
                                                <input type="text" class="form-control" value="">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                    <div class="form-group formSelectDays formseledDiasCOmple">
                                        <h4>Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDay domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDay lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDay marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDay mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDay jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDay vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDay saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos blockMedio2">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="">
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
                                                <input type="text" class="form-control" value="">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                    <div class="form-group formSelectDays formseledDiasCOmple">
                                        <h4>Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDay domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDay lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDay marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDay mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDay jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDay vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDay saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos blockMedio3">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="">
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
                                                <input type="text" class="form-control" value="">
                                                <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mnsAlertVacio">Debes seleccionar hora de entrada y salida</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                                    <div class="form-group formSelectDays formseledDiasCOmple">
                                        <h4>Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDay domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDay lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDay marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDay mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDay jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDay vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDay saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#!" class="newHorarioMedio">
                                <p>Agregar nuevo Horario</p>
                            </a>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueAddHorarios">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submitEditU">
                        <input type="submit" value="Aceptar">
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

@endsection

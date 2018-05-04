@extends('layouts.Template-admin-edit-users')

@section('content')
    <div class="container continerWithSite">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionAdminContain">
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido secCetTitleS">
                <h1>Agregar Empleado</h1>
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
                <p class="alert alert-success">El usuario se creo con exito</p>

                <form action="addUsersStore" method="post"  class="formEditUser" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- BLOCK ADD USER USER  -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales dataInformationPersonal">
                            <h3>Información personal</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Nombre</label>
                                <input type="text" name="name_user" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Segundo Nombre</label>
                                <input type="text" name="two_name_user" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Apellidos</label>
                                <input type="text" name="apellidos_user" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Correo personal</label>
                                <input type="email" name="email_user" required>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Genero</label>
                                <select  name="genere_user" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Estado civil</label>
                                <select name="estado_civil_user" required>
                                    <option value="Casado/a">Casado/a</option>
                                    <option value="Soltero/a">Soltero/a</option>
                                    <option value="Viudo/a">Viudo/a</option>
                                    <option value="Divorciado/a">Divorciado/a</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Dirección</label>
                                <input type="text" name="direction_user" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Departamento</label>
                                <input type="text" name="departamento_user" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Municipio</label>
                                <input type="text" name="municipio_user" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Cumpleaños</label>
                                <input type="date" name="cumple_user" step="1" min="1960-01-01" value="1980-01-01" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputFilesd">
                                <label for="">Foto</label>
                                <input type="file" name="foto_user" required>
                            </div>

                        </div>

                        <!-- FORMACION ACADEMICA  -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
                            <h3 class="separe_block">Formación Academica</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Bachillerato</label>
                                <input type="text" name="bachiller" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Técnico</label>
                                <input type="text" name="tecnico">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Superior</label>
                                <input type="text" name="superior">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Posgrado</label>
                                <input type="text" name="posgrado">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Diplomado</label>
                                <input type="text" name="diplomado">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Otros Conocimiento</label>
                                <input type="text" name="other_conoci">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Habilidades</label>
                                <input type="text" name="habilidades" required>
                            </div>
                        </div>

                        <!-- INFORMACION EMPLEADO -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
                            <h3 class="separe_block">Informacion Empleado</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Marca</label>
                                <select  name="marca_user" required>
                                    <option value="">Marca 1</option>
                                    <option value="">Marca 2</option>
                                    <option value="">Marca 3</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Sucursal</label>
                                <select name="sucursal_user" required>
                                    <option value="">Sucursal 1</option>
                                    <option value="">Sucursal 2</option>
                                    <option value="">Sucursal 3</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Correo Corporativo</label>
                                <input type="email" name="correo_corporativo" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Password</label>
                                <input id="password" type="password" name="password" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputSaDbdi">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                                    <label for="">Celular</label>
                                    <input type="text" name="cel_user" required>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                                    <label for="">Extención</label>
                                    <input type="text" name="ext_user" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Fecha Ingreso</label>
                                <input type="date" name="fecha_ingreso_user" step="1" min="1960-01-01" value="1980-01-01" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Area</label>
                                <select name="area_user" required>
                                    <option value="">Administrativa</option>
                                    <option value="">Contaduria</option>
                                    <option value="">Informatica</option>
                                    <option value="">Gerencia</option>
                                    <option value="">Supervisor</option>
                                    <option value="">Vendedor</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Cargo</label>
                                <input type="text" name="cargo_user" required>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Jefe Inmediato</label>
                                <select name="Jefe_inmediato_user" required>
                                    <option value="">Rodolfo</option>
                                    <option value="">Josue</option>
                                    <option value="">Lisseth</option>
                                    <option value="">Raquel</option>
                                    <option value="">Jennifer</option>
                                    <option value="">Lusia</option>
                                    <option value="">Yesenia</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
                                <label for="">Rol User</label>
                                <select name="type_user" required>
                                    <option value="">User</option>
                                    <option value="">Admin</option>
                                    <option value="">Editor</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- END BLOCK EDIT USER -->

                    <!-- BLOCK CLOCK -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclock">

                        <!-- HORARIOS DIAS COMPLETOS -->
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
                                            <div class='DayForDay domin' data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class='DayForDay lune' data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class='DayForDay marte' data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class='DayForDay mierco' data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class='DayForDay jueve' data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class='DayForDay vierne' data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class='DayForDay saba' data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- 2BLOQUE HORARIO COMPLETE -->
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
                                            <div class='DayForDay domin' data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class='DayForDay lune' data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class='DayForDay marte' data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class='DayForDay mierco' data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class='DayForDay jueve' data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class='DayForDay vierne' data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class='DayForDay saba' data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 3BLOQUE HORARIO COMPLETE -->
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
                                            <div class='DayForDay domin' data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class='DayForDay lune' data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class='DayForDay marte' data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class='DayForDay mierco' data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class='DayForDay jueve' data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class='DayForDay vierne' data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class='DayForDay saba' data-time="" data-day="Sabado">
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
                        <!-- END HORARIOS DIAS COMPLETOS -->

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallMedioDia">
                            <h4>Medio día</h4>

                            <!-- PRIMER BLOQUE MEDIO DIA  -->
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
                                            <div class='DayForDay domin' data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class='DayForDay lune' data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class='DayForDay marte' data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class='DayForDay mierco' data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class='DayForDay jueve' data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class='DayForDay vierne' data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class='DayForDay saba' data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- SEGUNDO BLOQUE MEDIO DIA -->
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
                                            <div class='DayForDay domin' data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class='DayForDay lune' data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class='DayForDay marte' data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class='DayForDay mierco' data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class='DayForDay jueve' data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class='DayForDay vierne' data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class='DayForDay saba' data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- TERCER BLOQUE MEDIO DIA -->
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
                                            <div class='DayForDay domin' data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class='DayForDay lune' data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class='DayForDay marte' data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class='DayForDay mierco' data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class='DayForDay jueve' data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class='DayForDay vierne' data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class='DayForDay saba' data-time="" data-day="Sabado">
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

                    <!-- END BLOCK CLOCK -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submitEditU">
                        <input type="submit" value='Aceptar'>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

@endsection

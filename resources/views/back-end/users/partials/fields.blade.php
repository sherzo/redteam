
<!-- BLOCK ADD USER USER  -->
<input type="hidden" name="user_id">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales dataInformationPersonal">
        <h3>Información personal</h3>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Nombre</label>
            <input type="text" name="name" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Segundo Nombre</label>
            <input type="text" name="second_name" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Apellidos</label>
            <input type="text" name="lastname" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Correo personal</label>
            <input type="email" name="personal_email" required>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Genero</label>
            <select  name="gender" required>
                <option value="1">Masculino</option>
                <option value="0">Femenino</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Estado civil</label>
            <select name="marital" required>
                <option value="0">Soltero/a</option>
                <option value="1">Casado/a</option>
                <option value="2">Divorciado/a</option>
                <option value="3">Viudo/a</option>
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Dirección</label>
            <input type="text" name="address" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Departamento</label>
            <input type="text" name="department" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Municipio</label>
            <input type="text" name="town" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Cumpleaños</label>
            <input type="date" name="birthdate" step="1" min="1960-01-01" value="1980-01-01" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputFilesd">
            <label for="">Foto</label>
            <input type="file" name="avatar" required>
        </div>

    </div>

    <!-- FORMACION ACADEMICA  -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
        <h3 class="separe_block">Formación Academica</h3>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Bachillerato</label>
            <input type="text" name="school" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Técnico</label>
            <input type="text" name="technical">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Superior</label>
            <input type="text" name="university">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Posgrado</label>
            <input type="text" name="postgraduate">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Diplomado</label>
            <input type="text" name="diplomat">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Otros Conocimiento</label>
            <input type="text" name="others">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Habilidades</label>
            <input type="text" name="abilities" required>
        </div>
    </div>

    <!-- INFORMACION EMPLEADO -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
        <h3 class="separe_block">Informacion Empleado</h3>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Marca</label>
            <select  name="mark_id" required>
                @forelse($marks as $key => $mark)
                    <option value="{{ $key }}">{{ $mark }}</option>
                @empty
                    <option>No hay marcas registradas</option>
                @endforelse
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Sucursal</label>
            <select name="branch_id" required>
                @forelse($branches as $key => $branch)
                    <option value="{{ $key }}">{{ $branch }}</option>
                @empty
                    <option>No hay marcas registradas</option>
                @endforelse
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Correo Corporativo</label>
            <input type="email" name="email" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputSaDbdi">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                <label for="">Celular</label>
                <input type="text" name="phone" required>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                <label for="">Extención</label>
                <input type="text" name="extension" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Fecha Ingreso</label>
            <input type="date" name="admission" step="1" min="1960-01-01" value="1980-01-01" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Area</label>
            <select name="area_id" required>
                @forelse($areas as $key => $area)
                    <option value="{{ $key }}">Administrativa</option>
                @empty
                    <option>No hay areas registradas</option>
                @endforelse
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Cargo</label>
            <input type="text" name="position" required>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Jefe Inmediato</label>
            <select name="boss_id" required>
                @forelse($bosses as $key => $boss)
                    <option value="{{ $key }}">{{ $boss }}</option>
                @empty
                    <option>No hay jefes registradas</option>
                @endforelse
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats">
            <label for="">Rol User</label>
            <select name="role_id" required>
                @forelse($roles as $key => $rol)
                    <option value="{{ $key }}">{{ $rol }}</option>
                @empty
                    <option>No hay roles</option>
                @endforelse
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

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


    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <p class="alert alert-success">Los datos del usuario se han actualizado</p>

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">
                    <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url('{{ asset('assets/profiles/73049.jpg') }}')"></div>
                    <a href="2">
                        <p class="fontMiriamProSemiBold">Administrador --</p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">
                    <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url('{{ asset('assets/profiles/27028.jpg') }}')"></div>
                    <a href="3">
                        <p class="fontMiriamProSemiBold">Jessica Ramirez</p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">
                    <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url('{{ asset('assets/profiles/56810.png') }}')"></div>
                    <a href="4">
                        <p class="fontMiriamProSemiBold">Francisca De Flores</p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">
                    <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url('{{ asset('assets/profiles/38742.png') }}')"></div>
                    <a href="5">
                        <p class="fontMiriamProSemiBold">Janixia Palacios</p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">
                    <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')"></div>
                    <a href="6">
                        <p class="fontMiriamProSemiBold">Alicia Ortíz</p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">
                    <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url('{{ asset('assets/profiles/67358.png') }}')"></div>
                    <a href="7">
                        <p class="fontMiriamProSemiBold">Julio Durán</p>
                    </a>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser">
                <form action="2/saveEdition" method="post" accept-charset="utf-8" class="formEditUser">
                    <input type="hidden" name="_token" value="Kx5bELaAPKRB5Hmk44pe8A5subMyEml7y2663sGH">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
                        <h3 class="editAs">Editar a</h3>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataImgAndranking">
                            <input type="hidden" class="idUserEdits" value="2">
                            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 imgProfiEdit">
                                <div class="label dataPrubeIm dataProfileEditUsers" style="background-image: url('{{ asset('assets/profiles/73049.jpg') }}')"></div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 editRankinFoto">
                                <h3>Administrador -- </h3>
                                <div class="contEditDatRanking">
                                    <div class="ui star rating disabled" data-rating="4"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                </div>
                                <a href="#!" id="fileuploader"><div class="ajax-upload-dragdrop" style="vertical-align: top; width: 400px;"><div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Upload<form method="POST" action="2/uploadFotoProfile" enctype="multipart/form-data" style="margin: 0px; padding: 0px;"><input type="file" id="ajax-upload-id-1523511476755" name="myfile[]" accept="image/*" multiple="" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;"></form></div><span style="display: none;"><b>Drag &amp; Drop Files</b></span></div><div></div></a><div class="ajax-file-upload-container"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Departamento al que pertenece</label>
                                <select name="data_departamento_edit">
                                    <option value="Gerencia">Gerencia</option>
                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Técnicos">Técnicos</option>
                                    <option value="Ventas Valdez Mobile Merliot">Ventas Valdez Mobile Merliot</option>
                                    <option value="Bodega">Bodega</option>
                                    <option value="Preventa">Preventa</option>
                                    <option value="Contabilidad">Contabilidad</option>
                                    <option value="Seguridad">Seguridad</option>
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Cargo</label>
                                <input type="text" name="data_cargo_edit" value="Gerente">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Género</label>
                                <select name="data_genero_edit" value="Masculino">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Estado civil</label>
                                <input type="text" name="data_estado_civil_edit" value="Casado/a">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Cumpleaños</label>
                                <input type="text" name="data_cumple_edit" value="1980-01-01">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Correo</label>
                                <input type="text" name="data_correo_corpo_edit" value="administrador@admin.com">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps inputSaDbdi">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                                        <label for="">Celular</label>
                                        <input type="text" name="data_celular_edit" value="78797888">
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye inputEditDatps">
                                        <label for="">Extención</label>
                                        <input type="text" name="data_extencion_edit" value="12">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Dirección</label>
                                <input type="text" name="data_direccion_edit" value="Merliot">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclock">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallDiasCompleto dayCOmpleTop">
                            <h3>Horario</h3>
                            <h4>Días completos</h4>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos bloOONes block1Edit">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="08:10">
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
                                                <input type="text" class="form-control" value="15:15">
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
                                        <p class="gasper">2</p>
                                        <h4 class="repetah4">Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDayEdit domin DaySelectActiveEdit    " data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDayEdit lune DaySelectActiveEdit  " data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDayEdit marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDayEdit mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDayEdit jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDayEdit vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDayEdit saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallDiasCompleto dayCOmpleTop">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos bloOONes block2Edit">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="08:00">
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
                                                <input type="text" class="form-control" value="18:00">
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
                                        <p class="gasper">1</p>
                                        <h4 class="repetah4">Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDayEdit domin    " data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDayEdit lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDayEdit marte DaySelectActiveEdit  " data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDayEdit mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDayEdit jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDayEdit vierne" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDayEdit saba" data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallMedioDia">
                            <h4>Medio día</h4>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos blockMedio1Edit">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="12:00">
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
                                                <input type="text" class="form-control" value="18:00">
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
                                        <p class="gasper">2</p>
                                        <h4 class="repetah4">Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDayEdit domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDayEdit lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDayEdit marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDayEdit mierco DaySelectActiveEdit " data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDayEdit jueve DaySelectActiveEdit  " data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDayEdit vierne " data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDayEdit saba " data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallMedioDia">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos blockMedio2Edit ">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                                    <div class="form-group">
                                        <h4>Entrada</h4>
                                        <div class="clearfix">
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="08:00">
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
                                                <input type="text" class="form-control" value="13:00">
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
                                        <p class="gasper">2</p>
                                        <h4 class="repetah4">Repetir</h4>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                                            <div class="DayForDayEdit domin" data-time="" data-day="Domingo">
                                                d
                                            </div>
                                            <div class="DayForDayEdit lune" data-time="" data-day="Lunes">
                                                l
                                            </div>
                                            <div class="DayForDayEdit marte" data-time="" data-day="Martes">
                                                m
                                            </div>
                                            <div class="DayForDayEdit mierco" data-time="" data-day="Miercoles">
                                                m
                                            </div>
                                            <div class="DayForDayEdit jueve" data-time="" data-day="Jueves">
                                                j
                                            </div>
                                            <div class="DayForDayEdit vierne DaySelectActiveEdit" data-time="" data-day="Viernes">
                                                v
                                            </div>
                                            <div class="DayForDayEdit saba DaySelectActiveEdit  " data-time="" data-day="Sabado">
                                                s
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueAddHorarios">
                            <input type="hidden" class="repeatBloqOneEdit" name="get_horariosc1" value="Domingo,Lunes">
                            <input type="hidden" class="repeatBloqOneEditTime" name="get_horariosc1_time" value="08:10,15:15">
                            <input type="hidden" class="repeatBloqOneEdit2" name="get_horariosc2" value="Martes">
                            <input type="hidden" class="repeatBloqOneEdit2Time" name="get_horariosc2_time" value="08:00,18:00">
                            <input type="hidden" class="repeatBloqOneEditMedio" name="get_horarios_medioc1" value="Miercoles,Jueves">
                            <input type="hidden" class="repeatBloqOneEdit1TimeMedio" name="get_horariosc1_time_medio" value="12:00,18:00">
                            <input type="hidden" class="repeatBloqOneEdit2Medio" name="get_horarios_medioc2" value="Viernes,Sabado">
                            <input type="hidden" class="repeatBloqOneEdit2TimeMedio" name="get_horariosc2_time_medio" value="08:00,13:00">
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

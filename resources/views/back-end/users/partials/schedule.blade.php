<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclock">

    <!-- HORARIOS DIAS COMPLETOS -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 databLoquOclockDetallDiasCompleto" >
        <h3>Horario</h3>
        <h4>Días completos</h4>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bloqueHorarioCompletos bloOONes" v-for="(c, i) in completes" v-show="c.show">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 daataEntrada">
                <div class="form-group">
                    <h4>Entrada</h4>
                    <div class="clearfix">
                        <div class="input-group clockpicker pull-center" :class="'clockpickerentry'+i" data-placement="left" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control" :id="'entry'+i" value="" @blur.native="updateTime(i)">
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
                        <div class="input-group clockpicker  pull-center" :class="'clockpickerexit'+i" data-placement="left" data-align="top" data-autoclose="true">
                            <input type="text" class="form-control" value="" :id="'exit'+i" @blur.native="updateTime(i)">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <p class="msgError" v-show="errors[i].active">Debes seleccionar hora de entrada y salida</p>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DaysOfSelect">
                <div class="form-group formSelectDays formseledDiasCOmple">
                    <h4>Repetir</h4>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  bloqueDayss">
                        <div class='DayForDay domin' data-time="" data-day="0" v-for="(d, j) in c.days" :class="{ 'activeDay': d.value, 'disabledDay' : !d.value && dayOccuped(j) }" @click="toggleDay(i, j)">
                            @{{ c.display[j] }}
                        </div>
                    </div>   
                </div>
            <br><br><br>
            </div>
        </div>

        <a href="#!" class="newHorario" @click="showSchedule" v-show="actived < 2">
            <p>Agregar nuevo Horario</p>
        </a>
    </div>
    <!-- END HORARIOS DIAS COMPLETOS -->
</div>
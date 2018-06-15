@extends('layouts.public')

@section('content')
<div id="evaluations">
    
    <div class="container continerWithSite">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 captionPosteos captionProfiles">
                <!-- Manuales DE PERMISO  -->
                <div class="col-xs-12 col-sm-12 col-md-12 LinksForEmpleados manualitiEvaluation">
                    <ul>
                        <li>
                            <a href="{{ asset('assets/pdf/Manual-de-empleado.pdf') }}" target="_blank">
                                Manual de empleado
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Reglamento institucional
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Ayuda
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles sectionPermissionRequest sectionEvalutionToPersonal" v-cloak>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 EvaluationPersonal">
                    <h3>Encargado de área: <span> {{ Auth::user()->full_name }} </span> </h3>
                    <h3>Evaluar a:</h3>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts" v-show="!inEvaluation">
                         {{-- For --}}     
            
                        <a href="" :class="{ 'UserYarealizo': e.evaluation }" v-for="(e,i) in employees" @click.prevent="startEvaluation(e)">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="label dataPrubeIm dataProfileEvaluaciones" :style="{ 'background-image': 'url(' + e.avatar + ')' }"></div>
                                <p class="colorBlack fontMiriamProSemiBold">@{{ e.name }}</p>

                                <div class="ui star rating" :data-rating="e.stars">
                                    <i class="icon" v-for="s in stars" :class="{ 'active': s <= e.stars }"></i>
                                </div>
                            </div>
                        </a>
                        
                        {{-- End For --}}                    
                    </div>

                    <form action="../../send_evaluacion" method="post" accept-charset="utf-8" class="formEvaliuacion" v-if="inEvaluation">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts profilesForDetall">
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 detallImgProfile">
                                <div class="label dataPrubeIm dataProfileEvaluacionesDetallUser" :style="{ 'background-image': 'url(' + employee.avatar + ')' }">
                                    
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 detallNameProfile">
                                <p class="colorBlack fontMiriamProSemiBold">@{{ employee.name }}</p>
                                <div class="ui star rating" :data-rating="employee.stars">
                                    <i class="icon" v-for="s in stars" :class="{ 'active': s <= employee.stars }"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textConesta TitleLISt">
                                <p>Contesta según nivel de desempeño, siendo malo el peor y excelente el mejor</p>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textConesta bgQuesdtions" v-for="(q,i) in questions">
                                <p>@{{ i+1 }}. @{{ q.question | replaceName }}</p>
                               
                                <ul class="Redconocistes">
                                    <li class="cssIILim oneLi" v-for="o in options">
                                        <a href="#!">
                                            <img class="img-responsive excelenteSu" :src="o.icon | urlImage" alt="excelente">
                                            <p>@{{ o.display }}</p>
                                        </a>
                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 OnePregunt">
                                            <img class="img-responsive activeSeleccionCarita" :src="selectedIcon | urlImage">
                                            <input type="hidden" value="10" data-class='onePregu'>
                                        </div>
                                    </li>
                                </ul>
                               
                            </div>

                            {{--@include('front-end.partials.preguntas-evaluacion') --}}

                        </div>

                    </form>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 captionRecordNotas SecCalendar">
                <div class="col-xs-12 col-sm-12 col-md-12 imagEvaluition">
                    <img class="img-responsive" src="{{ asset('assets/images/avatar/IcoPublich.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                </div>
            </div>
        </div>

        @include('components.publication')

    </div>

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
    <!-- Mensajes entrada salida -->
    @include('front-end.partials.fields-entrada-salida-mensajes')

    @include('front-end.partials.fields-windows-chat')
</div>@endsection

@section('js')
<script src="{{ asset('assets/js/src/evaluation.js') }}"></script>
@endsection
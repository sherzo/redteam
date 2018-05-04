@extends('layouts.Template-home')

@section('content')
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

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 sectionProfiles sectionPermissionRequest sectionEvalutionToPersonal">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 EvaluationPersonal">
                    <h3>Encargado de área: <span> Rodolfo daw </span> </h3>

                    <form action="../../send_evaluacion" method="post" accept-charset="utf-8" class="formEvaliuacion">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_idencargado" value="">
                        <input type="hidden" name="_iduser" value="">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts profilesForDetall">
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 detallImgProfile">
                                <div class="label dataPrubeIm dataProfileEvaluacionesDetallUser" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 detallNameProfile">
                                <p class="colorBlack fontMiriamProSemiBold">Stefany Renderos</p>
                                <div class="ui star rating" data-rating="5"></div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 textConesta TitleLISt">
                                <p>Contesta según nivel de desempeño, siendo malo el peor y excelente el mejor</p>
                            </div>

                            @include('front-end.partials.preguntas-evaluacion')

                        </div>

                    </form>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 captionRecordNotas SecCalendar">
                <div class="col-xs-12 col-sm-12 col-md-12 imagEvaluition ">
                    <img class="img-responsive evaluationEwstionMa" src="{{ asset('assets/images/avatar/IcoPublich.png') }}" alt="" data-toggle="modal" data-target="#myModal">
                </div>
            </div>
        </div>
        @include('front-end.partials.field-public-post')

    </div>

    </div>

    <div class="alert alert-info dataClMoPosPEr" role="alert">¡Publicacion Agregada!</div>
    <!-- Mensajes entrada salida -->
    @include('front-end.partials.fields-entrada-salida-mensajes')

    @include('front-end.partials.fields-windows-chat')
@endsection

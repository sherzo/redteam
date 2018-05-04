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

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts profilesUsersFinish">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataEvaluatioNFIna">
                            <h3>La evaluación de Stefany Renderos ha finalizado</h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 detallImgProfile profileSession">
                            <div class="label dataPrubeIm dataProfileEvaluacionesDetallUser" style="background-image: url('{{ asset('assets/profiles/49907.png') }}')"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 dataNamesUsers">
                            <p class="colorBlack fontMiriamProSemiBold">Stefany Renderos</p>
                            <div class="ui star rating" data-rating="5"></div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 NextEvalue">
                        <p>Seguir evaluando:</p>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ProfileFotosStarts">
                            <a href="evaluacion-a-personal" class="UserYarealizo">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="label dataPrubeIm dataProfileEvaluacionesEvaluados" style="background-image: url('{{ asset('assets/profiles/6242.jpg') }}')"></div>
                                    <p class="colorBlack fontMiriamProSemiBold">Francisca Flores</p>
                                    <div class="ui star rating" data-rating="4"></div>
                                </div>
                            </a>

                            <a href="evaluacion-a-personal">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="label dataPrubeIm dataProfileEvaluaciones" style="background-image: url('{{ asset('assets/profiles/31446.jpg') }}')"></div>
                                    <p class="colorBlack fontMiriamProSemiBold">Guillermo Martinez</p>
                                    <div class="ui star rating" data-rating="4"></div>
                                </div>
                            </a>
                        </div>
                    </div>

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

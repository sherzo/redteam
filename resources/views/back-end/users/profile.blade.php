@extends('layouts.admin')

@section('css')
<style>
    .activeDay {
        background: #039be5 !important;
        color: white !important;
    }

    .disabledDay {
        pointer-events: none;
        opacity: 0.4;
    }

    .msgError {
        background: #ef6e6e;
        float: left;
        margin-left: 15%;
        width: 50%;
        padding-left: 2%;
        padding: 1%;
        color: #131212;
        font-family: 'MyrianPro-Regular';
    }

    span.llegadaTarde {
        color: #ed1c24;
    }
    span.horaSalidaAntes {
        color: #39b54a;
    }
</style>
@endsection

@section('content')

    @include('components.header-admin', [
        'title' => 'Agregar empleado',
        'placeholder' => 'Buscar por nombre de usuario',
        'action' => 'users.search'
    ])
	
	<div class="container">
        <div class="col-md-1 col-lg-1"></div>
        <div style="margin-top: 50px;" class="col-xs-12 col-sm-10 col-md-10 col-lg-10 sectionCenterContenido sectionCenEdituser">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataImgAndranking">
                        <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 imgProfiEdit">
                            <div class="label dataPrubeIm dataProfileEditUsers" style="background-image: url('{{ $user->avatar }}')">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 editRankinFoto">
                            <h3>{{ $user->full_name }}</h3>
                            <div class="contEditDatRanking">
                                <div class="ui star rating disabled" data-rating="{{ $user->stars }}">
                                </div>
                            </div>
                            <div class="ajax-file-upload-container"></div>
                        </div>
                        <div class="col-sm-4"><br><br>
                            <div class="form-group">
                               <p><strong>Fecha admisión:</strong> {{ $user->work->admission }}</p>
                            </div>
                            <div class="form-group">
                                <p><strong>Télefono:</strong> {{ $user->work->phone }}</p>
                            </div>
                           
                        </div>
                        <div class="col-sm-4"><br><br>
                            <div class="form-group">
                               <p><strong>Correo personal:</strong> {{ $user->personal->email }}</p>
                            </div>
                            <div class="form-group">
                                <p><strong>Télefono:</strong> {{ $user->work->phone }}</p>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 DataformPersonales">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                            <h3>Assitencias asistencias </h3>
                            <small class="text-muted"><span class="llegadaTarde">Rojo</span>: Llegada tarde y <span class="horaSalidaAntes">Verde</span>: Salida antes de tiempo</small><br>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 actionAllUsers text-rigth" style="margin-left: 3%;">
                                <a href="{{ route('export', $user->id) }}">
                                    <p>
                                        Excel
                                    </p>
                                </a>
                            </div> 
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Entrada</th>
                                        <th class="text-center">Salida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assistances as $assistance)
                                        <tr>
                                            <td>{{ $assistance->date }}</td>
                                            <td><span class="{{ $assistance->entry_status ? 'llegadaTarde' : '' }}">
                                                    {{ $assistance->display_entry }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="{{ $assistance->exit_status ? 'horaSalidaAntes' : '' }}">
                                                    {{ $assistance->display_exit }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 DataformPersonales">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                            <h3 style="padding-top: 8px;">Desempeño de empleado</h3>
                            <small class="text-muted">Historial del desempeños del empleado</small>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Historial</th>
                                        <th class="text-center">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($performances as $performance)
                                        <tr>
                                            <td>{{ $performance->performance }}</td>
                                            <td>{{ $performance->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-1 col-lg-1"></div>

    </div>
@endsection

@section('js')
@endsection
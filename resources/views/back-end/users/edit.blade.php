@extends('layouts.admin')

@section('content')

    @include('components.header-admin', [
        'title' => 'Editar usuarios',
        'placeholder' => 'Buscar por nombre de usuario'
    ])
    <!-- SECTION BLOQUE NOTIFICACION Y MENSAJES -->
    <section class="container-fluid sectionAdminNotifiMensa">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            @include('flash::message')

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 OtherUserEdit">
                @foreach($users as $usr)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataForUserdonw">

                        <div class="label dataPrubeIm dataProfileEditUsersAlls" style="background-image: url({{ $usr->avatar }})"></div>
                        <a href="{{ route('users.edit', $usr->id) }}">
                            <p class="fontMiriamProSemiBold">{{ $usr->full_name }}</p>
                        </a>
                    </div>
                @endforeach                
            </div>

            {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) }}
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 sectionCenterContenido sectionCenEdituser">
                {{--<form action="2/saveEdition" method="post" accept-charset="utf-8" class="formEditUser">
                    --}}
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataBloquesForEdit">
                        <h3 class="editAs">Editar a {{ $user->full_name }}</h3>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dataImgAndranking">
                            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 imgProfiEdit">
                                <div class="label dataPrubeIm dataProfileEditUsers" style="background-image: url('{{ $user->avatar }}')"></div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5 col-lg-5 editRankinFoto">
                                <h3>{{ $user->name }}</h3>
                                <div class="contEditDatRanking">
                                    <div class="ui star rating disabled" data-rating="{{ $user->stars }}"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon"></i></div>
                                </div>
                                <a href="#!" id="fileuploader">
                                    <div class="ajax-upload-dragdrop" style="vertical-align: top; width: 400px;">
                                        <div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Upload
                                        {{--<form method="POST" action="2/uploadFotoProfile" enctype="multipart/form-data" style="margin: 0px; padding: 0px;">
                                            --}}
                                            <input type="file" id="ajax-upload-id-1523511476755" name="avatar" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;">
                                        {{--</form>--}}
                                        </div>
                                        <span style="display: none;"><b>Drag &amp; Drop Files</b>
                                     
                                        </span>
                                    </div>
                                <div></div>
                                </a><div class="ajax-file-upload-container"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Departamento al que pertenece</label>
                                <select name="area_id">
                                    @foreach($areas as $key => $area)
                                        <option value="{{ $key }}" {{ $user->work->area_id == $key ? 'selected' : '' }}>{{ $area }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Cargo</label>
                                <input type="text" name="position" value="{{ $user->work->position }}">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Jefe Inmediato</label>
                                <select name="boss_id" required="">
                                    @foreach($users as $boss)
                                        <option value="{{ $boss->id }}" {{ $user->boss_id == $boss->id ? 'selected' : '' }}>
                                            {{ $boss->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 DataformPersonales dataInformationPersonal">
                            <h3>Información personal</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Género</label>
                                <select name="data_genero_edit" value="Masculino">
                                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }} >Masculino</option>
                                    <option value="0"  {{ $user->gender == 0 ? 'selected' : '' }} >Femenino</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Estado civil</label>
                                <select name="marital" required>
                                    <option value="0" {{ $user->personal->marital == 0 ? 'selected' : '' }}>Soltero/a</option>
                                    <option value="1" {{ $user->personal->marital == 1 ? 'selected' : '' }}>Casado/a</option>
                                    <option value="2" {{ $user->personal->marital == 2 ? 'selected' : '' }}>Divorciado/a</option>
                                    <option value="3" {{ $user->personal->marital == 3 ? 'selected' : '' }}>Viudo/a</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Cumpleaños</label>
                                <input type="date" name="birthdate" value="{{ $user->personal->birthdate }}">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Correo</label>
                                <input type="email" name="personal_email" value="{{ $user->personal->personal_email }}">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps inputSaDbdi">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye">
                                        <label for="">Celular</label>
                                        <input type="text" name="phone" value="{{ $user->work->phone }}">
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 datTwoBliuqye inputEditDatps">
                                        <label for="">Extención</label>
                                        <input type="text" name="extension" value="{{ $user->work->extension }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formInputsDats inputEditDatps">
                                <label for="">Dirección</label>
                                <input type="text" name="address" value="{{ $user->personal->address }}" required="">
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submitEditU">
                        <input type="submit" value="Aceptar">
                    </div>
                {{--</form>--}}
            </div>
            {{ Form::close() }}
        </div>
    </section>


    <!-- Modal -->
    @include('front-end.partials.field-public-post')

@endsection

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/clock/bootstrap-clockpicker.min.js') }}" type="text/javascript" ></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker()
        .find('input').change(function() {
        console.log(this.value);
    });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
<script src="{{ asset('assets/js/admin/main_horarios.js') }}" type="text/javascript" ></script>
<script src="{{ asset('assets/js/admin/main_horarios_edit.js') }}" type="text/javascript"></script>
@endsection


